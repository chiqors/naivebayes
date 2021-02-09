<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="img/nbc.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- font awsome -->
    <link rel="stylesheet" href="css/fontawesome.css"/>
    <link rel="stylesheet" href="css/brands.css"/>
    <link rel="stylesheet" href="css/solid.css"/>

    <link rel="stylesheet" href="css/gaya.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/datatables.css">

    <title>Naive Bayes - Data Latih</title>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/nbc.png" alt="" width=50 height=50>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Naive Bayes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_latih.php">Data Latih</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tambah_data.php">Tambah Data <span class="sr-only">(current)</span> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style='margin-top:90px; margin-bottom: 90px'>
    <div class="row">
        <div class="mt-5 col-12">
            <h2 class="tebal">Tambah Data Latih</h2><br>
            <p class="desc">Form ini digunakan untuk menambah data latih </p><br>
            <form method="POST" action="proses/add_data.php" class="mt-3">

                <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai :</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                </div>

                <div class="form-group">
                    <label for="masa_kerja">Masa Kerja :</label>
                    <input type="number" class="form-control" id="masa_kerja" name="masa_kerja" min="0" max="30"
                           required>
                </div>

                <div class="form-group">
                    <label for="usia">Usia :</label>
                    <input type="number" class="form-control" id="usia" name="usia" min="25" max="55" required>
                </div>

                <div class="form-group">
                    <label for="nilai_pelatihan">Nilai Pelatihan :</label>
                    <input type="number" class="form-control" id="nilai_pelatihan" name="nilai_pelatihan" min="50"
                           max="100" required>
                </div>

                <div class="form-group">
                    <label for="nilai_kinerja">Nilai Kinerja :</label>
                    <input type="number" class="form-control" id="nilai_kinerja" name="nilai_kinerja" min="50" max="100"
                           required>
                </div>

                <div class="form-group">
                    <label for="hasil_evaluasi">Hasil Evaluasi</label>
                    <select class="form-control" name="hasil_evaluasi">
                        <optgroup label="Pilih Hasil Evaluasi">
                            <option value="PROMOSI">PROMOSI</option>
                            <option value="MUTASI">MUTASI</option>
                            <option value="PHK">PHK</option>
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit" class="mt-3 btn btn-primary""/>
                </div>

            </form>
        </div>
    </div>

</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="jspopper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/datatables.js"></script>

<!-- validasi -->
<script>
    $(document).ready(function () {
        $('.toggle').click(function () {
            $('ul').toggleClass('active');
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#dataLatih').dataTable({
            "pageLength": 50
        });
    });
</script>

</body>
</html>
