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
        </ul>
      </div>
    </div>
  </nav>

    <div class="container" style='margin-top:90px'>
      <div class="row">
        <div class="mt-5 col-12">
          <h2 class="tebal">Naive Bayes</h2>
          <p class="mt-4 desc">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes.
          Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes,
          yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes.
          Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yang sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.
          Menurut Olson Delen (2008) menjelaskan Naïve Bayes untuk setiap kelas keputusan, menghitung probabilitas dg syarat bahwa kelas keputusan adalah benar,
          mengingat vektor informasi obyek. Algoritma ini mengasumsikan bahwa atribut obyek adalah independen.
          Probabilitas yang terlibat dalam memproduksi perkiraan akhir dihitung sebagai jumlah frekuensi dari " master " tabel keputusan.</p>
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
            <input type="text" class="form-control" name="nama_pegawai">
          </div>

          <div class="form-group">
            <label for="masa_kerja">Masa Kerja :</label>
            <select name="masa_kerja" id="masa_kerja" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih masa kerja anda--</option>
                      <?php
                      for($i=20 ; $i <= 25 ; $i++){
                        echo"<option value='$i'>$i</option>";
                      }
                      ?>
            </select>
          </div>

          <div class="form-group">
            <label for="usia">Usia :</label>
            <select name="usia" id="usia" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih usia anda--</option>
                      <?php
                      for($i=20 ; $i <= 25 ; $i++){
                        echo"<option value='$i'>$i</option>";
                      }
                      ?>
            </select>
          </div>

          <div class="form-group">
            <label for="nilai_pelatihan">Nilai Pelatihan :</label>
            <input type="number" class="form-control" name="nilai_pelatihan">
          </div>

          <div class="form-group">
            <label for="nilai_kinerja">Nilai Kinerja :</label>
            <input type="number" class="form-control" name="nilai_kinerja">
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

    //validasi
    var np = document.getElementById("nama_pegawai");
    var mk = document.getElementById("masa_kerja");
    var u = document.getElementById("usia");
    var npe = document.getElementById("nilai_pelatihan");
    var nki = document.getElementById("nilai_kinerja");

    if(np.selectedIndex == ""){
      alert("Nama Tidak Boleh Kosong");
      return false;
    }

    if(mk.selectedIndex == 0){
      alert("Masa Kerja Tidak Boleh Kosong");
      return false;
    }

    if(u.selectedIndex == 0){
      alert("Usia Tidak Boleh Kosong");
      return false;
    }

    if(npe.selectedIndex == 0){
      alert("Nilai Pelatihan Tidak Boleh Kosong");
      return false;
    }

    if(nki.selectedIndex == 0){
      alert("Nilai Kinerja Tidak Boleh Kosong");
      return false;
    }

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
