<?php
    require_once('hasil.php');
    require_once('func_process.php');

    try {
        $data     = array();
        $bobot    = array(6, 7, 7, 8);
        $filename = $_FILES['selectfile']['name'] ?? "";

        if (empty($filename))
            throw new Exception("Upload File Terlebih Dahulu", 0);

        $pathinfo = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($pathinfo, array('xls', 'xlsx')) )
            throw new Exception("Hanya boleh upload file dengan eksensi .xls dan .xlsx", 0);

        require('./lib/excelreader/php-excel-reader/excel_reader2.php');
        require('./lib/excelreader/SpreadsheetReader.php');

        $target_dir = "./asset/upload/" . basename($filename);
        @move_uploaded_file($_FILES['selectfile']['tmp_name'], $target_dir);

        $readfile = new SpreadsheetReader($target_dir);

        foreach ($readfile as $key => $row) {
            if ($key < 2) continue;

            if (!is_numeric($row[3]) OR !is_numeric($row[4]) OR !is_numeric($row[5]) OR !is_numeric($row[6]))
                continue;

            $siswa          = array();
            $siswa['nama']  = $row[2];
            $siswa['kelas'] = $row[1];
            $siswa['nilai'] = array($row[3], $row[4], $row[5], $row[6]); 

            array_push($data, $siswa);
        }

        @unlink($target_dir);

        $vector = array();
        $wp     = new WP();
        $bobot  = $wp->bobot($bobot);

        // perhitungan vektor
        for ($i = 0; $i < count($data); $i++) {
            $nilai = $data[$i]['nilai'];

            $vt = $wp->vektor($nilai, $bobot);
            array_push($vector, $vt);
        }

        // perangkingan
        $rank = array();
        for ($i = 0; $i < count($data); $i++) { 
            $urut = $wp->ranking($vector[$i], array_sum($vector));
            $urut = array(
                        "nama"  => $data[$i]['nama'],
                        "kelas" => $data[$i]['kelas'],
                        "nilai" => $urut
                    );

            array_push($rank, $urut);
        }

        $nilai = array_column($rank, 'nilai');
        array_multisort($nilai, SORT_DESC, $rank);

        return viewHasil($rank);
    }
    catch (Throwable $e) {
        echo "<script>
                    alert('" . $e->getMessage() . "');
                    document.location='index.php'
                </script>";
    }
?>