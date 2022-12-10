<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dika Fahrozy">
    <title>SPK Pemilihan Calon OSIS | SMPN 1 Parungpanjang</title>
    <link rel='shortcut icon' href='./asset/img/opl.png'>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <main>
        <div class="container py-4 center">
            <header class="pb-3 mb-4 border-bottom">
                <img src="asset/img/opl.png" alt="Logo Osis" width="100px">
                <img src="asset/img/Osis.png" alt="Logo Osis" width="100px"><br>
                <span class="fs-4">Sistem Penunjang Keputusan Pemilihan OSIS</span>
                <p class="fs-4">SMPN 1 Parungpanjang</p>
            </header>

            <form method="post" action='process.php' enctype="multipart/form-data" class="col-sm-6 offset-3">
                <p><small>Catatan : hanya dapat upload file dengan ekstensi .xls dan .xlsx</small></p>
                <div id="drop_zone">
                    <p><b>TARIK FILE KESINI</b></p>
                    <p><b>ATAU</b></p>
                    <p>
                        <button type="button" id="btn_file_pick" class="btn btn-primary">
                            <span class="bi bi-folder2-open"></span> Pilih File
                        </button>
                    </p>
                    <p id="file_info"></p>
                    <input type="file" id="selectfile" name='selectfile' multiple>
                </div>
                <div class="py-3">
                    <p>
                        <button type="submit" id="btn_upload" class="btn btn-primary">
                            <span class="bi bi-bar-chart-line"></span> Kalkulasikan
                        </button>
                    </p>
                    <a href="./asset/input-data-spk.xls">Download contoh input data</a>
                </div>
            </form>
        </div>
    </main>
    <footer class="bottom">
        <div class="container py-2 center">
            <footer class="pt-3 mb-4 text-muted border-top">
                &copy; 2022 with <i class="bi bi-heart-fill error"></i> By Dika Fahrozy
            </footer>
        </div>
    </footer>

    <script src="./asset/js/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="./asset/js/main.js" crossorigin="anonymous"></script>
</body>

</html>