<?php
    function viewHasil($kandidat) 
    {
        $hasil = "";
        for ($i = 0; $i < count($kandidat); $i++) {
            $urut = ($i + 1);

            switch ($urut) {
                case in_array($urut, range(1, 3)):
                    $ket = "Calon Ketua Osis " . $urut;
                    break;
                case in_array($urut, range(4, 6)):
                    $ket = "Calon Wakil Ketua Osis " . ($urut - 3);
                    break;
                case in_array($urut, range(7, 16)):
                    $ket = "Anggota";
                    break;
                default:
                    $ket = "Tidak Lulus Seleksi";
                    break;
            }

            $hasil .= "<tr>" .
                            "<td>" . $urut . "</td>" . 
                            "<td>" . $kandidat[$i]['nama'] . "</td>" . 
                            "<td>" . $kandidat[$i]['kelas'] . "</td>" . 
                            "<td>" . round($kandidat[$i]['nilai'], 3) . "</td>" . 
                            "<td>" . $ket . "</td>" . 
                        "</tr>";
        }

        $strHTML  = "<!DOCTYPE html>
                    <html lang='en'>

                    <head>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1'>
                        <meta name='author' content='Dika Fahrozy'>
                        <title>SPK Pemilihan Calon OSIS | SMPN 1 Parungpanjang</title>
                        <link rel='shortcut icon' href='./asset/img/opl.png'>
                        <link rel='stylesheet' href='./asset/css/bootstrap.min.css'>
                        <link rel='stylesheet' href='./asset/css/main.css'>
                        <link rel='stylesheet' href='./asset/css/datatables.min.css'>
                        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css'>
                    </head>

                    <body>
                        <main>
                            <div class='container py-4 center'>
                                <header class='pb-3 mb-4 border-bottom'>
                                    <img src='asset/img/opl.png' alt='Logo Osis' width='100px'>
                                    <img src='asset/img/Osis.png' alt='Logo Osis' width='100px'><br>
                                    <span class='fs-4'>Sistem Penunjang Keputusan Pemilihan OSIS</span>
                                    <p class='fs-4'>SMPN 1 Parungpanjang</p>
                                </header>

                                <div class='col-sm-6 offset-3'>
                                    <h3>Hasil Preferensi Calon Kandidat</h3>
                                </div>

                                <div class='col-sm-8 offset-2 py-4'>
                                    <table class='table table-striped talble-bordered table-hover'>
                                        <thead class='table-primary'>
                                            <th>Peringkat</th>
                                            <th>Nama</th>
                                            <th>Kelas/Ruang</th>
                                            <th>Nilai Preferensi</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            " . $hasil . "
                                        </tbody>
                                    </table>
                                    <hr>
                                    <a href='index.php' class='btn btn-primary'><i class='bi bi-arrow-left-square'></i> Kembali</a>
                                </div>
                            </div>
                        </main>
                        <footer class='bottom'>
                            <div class='container py-2 center'>
                                <footer class='pt-3 mb-4 text-muted border-top'>
                                    &copy; 2022 with <i class='bi bi-heart-fill error'></i> By Dika Fahrozy
                                </footer>
                            </div>
                        </footer>

                        <script src='./asset/js/jquery-3.6.1.min.js' crossorigin='anonymous'></script>
                        <script src='./asset/js/datatables.min.js' crossorigin='anonymous'></script>
                        <script>
                            $(document).ready(function(){
                                $('table').DataTable({
                                    ordering: false,
                                    lengthMenu: [10, 16],
                                    pageLength: 16,
                                });
                            });
                        </script>
                    </body>

                    </html>";

        echo $strHTML;
    }
?>