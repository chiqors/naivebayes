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

  <title>DATA SIMULASI</title>
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
            <a class="nav-link" href="data_simulasi.php">Data Latih <span class="sr-only">(current)</span></a>
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
              <th>Umur</th>
              <th>Berat Badan</th>
              <th>Pendidikan</th>
              <th>Tinggi Badan</th>
              <th>Status Kesehatan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $data = 'data.json';
            $json = file_get_contents($data);
            $hasil = json_decode($json,true);

            $no = 1;
            foreach ($hasil as $hasil) {

              if($hasil['status'] == 1){
                $stt = "diterima";
              }else{
                $stt = "ditolak";
              }

              if($hasil['tinggi'] == "ideal"){
                $tinggi = "normal";
              }else if($hasil['tinggi'] == "kt"){
                $tinggi = "kurang tinggi";
              }else if($hasil['tinggi'] == "st"){
                $tinggi = "sangat tinggi";
              }

              if($hasil['kesehatan'] == "sehat"){
                $sehat = "sehat";
              }else if($hasil['kesehatan'] == "tidak_sehat"){
                $sehat = "tidak sehat";
              }
          ?>

            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $hasil['umur']; ?></td>
              <td><?php echo $hasil['berat_badan']; ?></td>
              <td><?php echo $hasil['pendidikan']; ?></td>
              <td><?php echo $tinggi ?></td>
              <td><?php echo $sehat; ?></td>
              <td><?php 
              if($stt == "diterima"){
                echo "<span class='badge badge-success' style='padding:10px'>diterima</span>";
              }else{
                echo "<span class='badge badge-danger' style='padding:10px'>ditolak</span>";
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
