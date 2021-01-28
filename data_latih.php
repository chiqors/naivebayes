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

  <link rel="stylesheet" href="css/datatables.css">

  <title>Naive Bayes - Data Latih</title>
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Naive Bayes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="data_latih.php">Data Latih <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container" style='margin-top:90px; margin-bottom: 90px'>
  <div class="row">
    <div class="mt-5 col-12">
      <h2 class="tebal">List Data Latih</h2><br>
      <p class="desc">Berikut ini adalah data latih yang saya gunakan dalam membuat simulasi kemungkinan diterimanya calon pendaftar PT.KAI menggunakan metode naive bayes. Data ini dikumpulkan melalui metode wawancara dan melakukan riset kepada narasumber.</p><br>

        <table id="dataLatih" class="pt-3 mb-3 display">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pegawai</th>
              <th>Masa Pegawai</th>
              <th>Usia</th>
              <th>Nilai Pelatihan</th>
              <th>Nilai Kinerja</th>
              <th>Hasil Evaluasi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $data = 'data2.json';
            $json = file_get_contents($data);
            $hasil = json_decode($json,true);

            $no = 1;
            foreach ($hasil as $hasil) {
          ?>

            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $hasil['nama_pegawai']; ?></td>
              <td><?php echo $hasil['masa_kerja']; ?></td>
              <td><?php echo $hasil['usia']; ?></td>
              <td><?php echo $hasil['nilai_pelatihan'] ?></td>
              <td><?php echo $hasil['nilai_kinerja']; ?></td>
              <td><?php 
              if($hasil['hasil_evaluasi'] == "PROMOSI"){
                echo "<span class='badge badge-success' style='padding:10px'>PROMOSI</span>";
              }elseif($hasil['hasil_evaluasi'] == "MUTASI"){
                echo "<span class='badge badge-warning' style='padding:10px'>MUTASI</span>";
              }else{
                echo "<span class='badge badge-danger' style='padding:10px'>PHK</span>";
              }
              ?></td>
            </tr>

          <?php
          $no++;
          }
          ?>
          </tbody>
        </table>
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
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>

<script>
  $(document).ready(function() {
      $('#dataLatih').dataTable({
        "pageLength" : 50
      });
  });
</script>

</body>
</html>
