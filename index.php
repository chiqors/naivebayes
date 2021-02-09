<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="img/nbc.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Naive Bayes - Input</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
            <img src="img/nbc.png" alt="" width=50 height=50>
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="ml-auto navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Naive Bayes
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_latih.php">Data Latih</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="tambah_data.php">Tambah Data</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container" style='margin-top:90px'>
      <div class="row">
        <div class="mt-5 col-12">
          <h2 class="tebal">Naive Bayes</h2>
          <p>Sebuah perusahaan melakukan evaluasi tahunan terhadap sejumlah pegawainya. Pimpinan menetapkan hasil evaluasi berupa PROMOSI, MUTASI, PHK. Setiap hasil evaluasi tersebut didasarkan pada kriteria-kriteria.  Deskripsi kriteria tersebut dapat dilihat pada tabel berikut:  </p>
          <table class='table table-bordered' style='font-size:18px;text-align:center'>
            <tr style='background-color:#17a2b8;color:#fff'>
              <th>Masa Kerja</th>
              <th>Usia</th>
              <th>Nilai Pelatihan</th>
              <th>Nilai Kinerja</th>
            </tr>
            <tr>
              <td>0 - 10</td>
              <td>46 - 55</td>
              <td>50 - 65</td>
              <td>50 - 65</td>
            </tr>
            <tr>
              <td>11 - 20</td>
              <td>36 - 45</td>
              <td>66 - 85</td>
              <td>66 - 85</td>
            </tr>
            <tr>
              <td>21 - 30</td>
              <td>25 - 35</td>
              <td>86 - 100</td>
              <td>86 - 100</td>
            </tr>
          </table>
        </div>
      </div>

    <div class="row">
      <div class="mt-4 col-12">
        <h3 class="tebal">Simulasi Probabilitas Diterimanya Ada Di Perusahaan</h3>
      </div>

      <div class="col-6">
          <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai :</label>
            <input value="" type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
          </div>

          <div class="form-group">
            <label for="masa_kerja">Masa Kerja :</label>
            <input value="" type="number" class="form-control" id="masa_kerja" name="masa_kerja" min="0" max="30" required>
          </div>

          <div class="form-group">
            <label for="usia">Usia :</label>
            <input value="" type="number" class="form-control" id="usia" name="usia" min="25" max="55" required>
          </div>

          <div class="form-group">
            <label for="nilai_pelatihan">Nilai Pelatihan :</label>
            <input value="" type="number" class="form-control" id="nilai_pelatihan" name="nilai_pelatihan" min="50" max="100" required>
          </div>

          <div class="form-group">
            <label for="nilai_kinerja">Nilai Kinerja :</label>
            <input value="" type="number" class="form-control" id="nilai_kinerja" name="nilai_kinerja" min="50" max="100" required>
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="mt-3 btn btn-primary" id="dor" onclick="return simulasi()"/>
          </div>

          </form>
      </div>
    </div>
        
    <div class="row">
      <div class="mt-5 mb-5 col-12">
          <div id="hasilSIM" style="margin-bottom:30px;">

          </div>
      </div>
    </div>

    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="jspopper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- validasi -->
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>

<script>
  function simulasi()
  {
    var nama_pegawai = $("#nama_pegawai").val();
    var masa_kerja = $("#masa_kerja").val();
    var usia = $("#usia").val();
    var nilai_pelatihan = $("#nilai_pelatihan").val();
    var nilai_kinerja = $("#nilai_kinerja").val();

    //batas validasi

      $.ajax({
        url :'simulasi.php',
        type : 'POST',
        dataType : 'html',
        data : {nama_pegawai : nama_pegawai , masa_kerja : masa_kerja , usia : usia , nilai_pelatihan : nilai_pelatihan , nilai_kinerja : nilai_kinerja},
        success : function(data){
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

  }
</script>

<script>
$(document).ready(function(){
  $('#dor').click(function(){
    $('html, body').animate({
        scrollTop: $("#hasilSIM").offset().top
    }, 500);
  });
});
</script>
</body>
</html>
