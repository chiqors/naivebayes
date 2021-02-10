<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumPromosi = $obj->sumPromosi();
$jumMutasi = $obj->sumMutasi();
$jumPHK = $obj->sumPHK();
$jumData = $obj->sumData();

$a1 = $_POST['nama_pegawai'];
$a2 = $_POST['masa_kerja'];
$a3 = $_POST['usia'];
$a4 = $_POST['nilai_pelatihan'];
$a5 = $_POST['nilai_kinerja'];

//Kategori
$kategori_masa_kerja = $obj->categorizeSimulasi($a2,'MK');
$kategori_usia = $obj->categorizeSimulasi($a3,'U');
$kategori_nilai_pelatihan = $obj->categorizeSimulasi($a4,'NP');
$kategori_nilai_kinerja = $obj->categorizeSimulasi($a5,'NK');

//PROMOSI
$masa_kerja1 = $obj->probMasaKerja($a2,"PROMOSI");
$usia1 = $obj->probUsia($a3,"PROMOSI");
$nilai_pelatihan1 = $obj->probNilaiPelatihan($a4,"PROMOSI");
$nilai_kinerja1 = $obj->probNilaiKinerja($a5,"PROMOSI");

//MUTASI
$masa_kerja2 = $obj->probMasaKerja($a2,"MUTASI");
$usia2 = $obj->probUsia($a3,"MUTASI");
$nilai_pelatihan2 = $obj->probNilaiPelatihan($a4,"MUTASI");
$nilai_kinerja2 = $obj->probNilaiKinerja($a5,"MUTASI");

//PHK
$masa_kerja3 = $obj->probMasaKerja($a2,"PHK");
$usia3 = $obj->probUsia($a3,"PHK");
$nilai_pelatihan3 = $obj->probNilaiPelatihan($a4,"PHK");
$nilai_kinerja3 = $obj->probNilaiKinerja($a5,"PHK");

//result
$paPromosi = $obj->hasilPromosi($jumPromosi,$jumData,$masa_kerja1,$usia1,$nilai_pelatihan1,$nilai_kinerja1);
$paMutasi = $obj->hasilPromosi($jumMutasi,$jumData,$masa_kerja2,$usia2,$nilai_pelatihan2,$nilai_kinerja2);
$paPHK = $obj->hasilPHK($jumPHK,$jumData,$masa_kerja3,$usia3,$nilai_pelatihan3,$nilai_kinerja3);

//echo output
$p_promosi = $jumPromosi / $jumData;
$p_mutasi = $jumMutasi / $jumData;
$p_phk = $jumPHK / $jumData;

$p_masa_kerja_promosi = $masa_kerja1 / $jumPromosi;
$p_masa_kerja_mutasi =  $masa_kerja2 / $jumMutasi;
$p_masa_kerja_phk =  $masa_kerja3 / $jumPHK;
$p_usia_promosi = $usia1 / $jumPromosi;
$p_usia_mutasi = $usia2 / $jumMutasi;
$p_usia_phk = $usia3 / $jumPHK;
$p_nilai_pelatihan_promosi = $nilai_pelatihan1 / $jumPromosi;
$p_nilai_pelatihan_mutasi = $nilai_pelatihan2 / $jumMutasi;
$p_nilai_pelatihan_phk = $nilai_pelatihan3 / $jumPHK;
$p_nilai_kinerja_promosi = $nilai_kinerja1 / $jumPromosi;
$p_nilai_kinerja_mutasi = $nilai_kinerja2 / $jumMutasi;
$p_nilai_kinerja_phk = $nilai_kinerja3 / $jumPHK;

$p_x_promosi = $p_masa_kerja_promosi * $p_usia_promosi * $p_nilai_pelatihan_promosi * $p_nilai_kinerja_promosi;
$p_x_mutasi = $p_masa_kerja_mutasi * $p_usia_mutasi * $p_nilai_pelatihan_mutasi * $p_nilai_kinerja_mutasi;
$p_x_phk = $p_masa_kerja_phk * $p_usia_phk * $p_nilai_pelatihan_phk * $p_nilai_kinerja_phk;

$p_fix_promosi = $p_x_promosi * $p_promosi;
$p_fix_mutasi = $p_x_mutasi * $p_mutasi;
$p_fix_phk = $p_x_phk * $p_phk;

echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan masukan calon pegawai menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='row'>
  <div class='col'>
    <div class='card'>
      <div class='card-header' style='background-color:#17a2b8;color:#fff'>
        <b>Informasi Calon Pegawai</b>
      </div>
      <ul class='list-group list-group-flush'>
        <li class='list-group-item'>Nama Pegawai : &nbsp;&nbsp;<b>$a1</b></li>
        <li class='list-group-item'>Masa Kerja : &nbsp;&nbsp;<b>$a2</b> ($kategori_masa_kerja)</li>
        <li class='list-group-item'>Usia : &nbsp;&nbsp;<b>$a3</b> ($kategori_usia)</li>
        <li class='list-group-item'>Nilai Pelatihan : &nbsp;&nbsp;<b>$a4</b> ($kategori_nilai_pelatihan)</li>
        <li class='list-group-item'>Nilai Kinerja : &nbsp;&nbsp;<b>$a5</b> ($kategori_nilai_kinerja)</li>
      </ul>
    </div>
  </div>
  <div class='col'>
    <table class='table table-bordered' style='font-size:18px;text-align:center'>
      <tr style='background-color:#17a2b8;color:#fff'>
        <th>Jumlah Promosi</th>
        <th>Jumlah Mutasi</th>
        <th>Jumlah PHK</th>
        <th>Jumlah Total Data</th>
      </tr>
      <tr>
        <td>$jumPromosi</td>
        <td>$jumMutasi</td>
        <td>$jumPHK</td>
        <td>$jumData</td>
      </tr>
    </table>
  </div>
</div>
<br>
<hr>
";

echo "<br>";

echo "<br>
<div class='row'>
  <div class='col'>
    <table class='table table-bordered' style='font-size:18px;text-align:center'>
      <tr style='background-color:#17a2b8;color:#fff'>
        <th></th>
        <th>Promosi</th>
        <th>Mutasi</th>
        <th>PHK</th>
      </tr>
      <tr>
        <td>Masa Kerja</td>
        <td>$masa_kerja1 / $jumPromosi</td>
        <td>$masa_kerja2 / $jumMutasi</td>
        <td>$masa_kerja3 / $jumPHK</td>
      </tr>
      <tr>
        <td>Usia</td>
        <td>$usia1 / $jumPromosi</td>
        <td>$usia2 / $jumMutasi</td>
        <td>$usia3 / $jumPHK</td>
      </tr>
      <tr>
        <td>Nilai Pelatihan</td>
        <td>$nilai_pelatihan1 / $jumPromosi</td>
        <td>$nilai_pelatihan2 / $jumMutasi</td>
        <td>$nilai_pelatihan3 / $jumPHK</td>
      </tr>
      <tr>
        <td>Nilai Kinerja</td>
        <td>$nilai_kinerja1 / $jumPromosi</td>
        <td>$nilai_kinerja2 / $jumMutasi</td>
        <td>$nilai_kinerja3 / $jumPHK</td>
      </tr>
    </table>
  </div>
  <div class='col'>
    <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#17a2b8;color:#fff'>
      <th>Presentasi Promosi</th>
      <th>Presentasi Mutasi</th>
      <th>Presentasi PHK</th>
    </tr>
    <tr>
      <td>$paPromosi</td>
      <td>$paMutasi</td>
      <td>$paPHK</td>
    </tr>
  </table>
  </div>
</div>
";

echo "<br>
  <div class='card'>
    <div class='card-header' style='background-color:#17a2b8;color:#fff'>
      <b>Formula / Rumus</b>
    </div>
    <div class='card-body'>
      <h2>Langkah 1: Menghitung P(Ci)</h2>
      <p>P(Promosi) = $jumPromosi / $jumData = $p_promosi</p>
      <p>P(Mutasi) = $jumMutasi / $jumData = $p_mutasi</p>
      <p>P(PHK) = $jumPHK / $jumData = $p_phk</p>
      <h2>Langkah 2: Menghitung P(X|Ci)</h2>
      <p>P($kategori_masa_kerja | Promosi) = $masa_kerja1 / $jumPromosi = $p_masa_kerja_promosi</p>
      <p>P($kategori_masa_kerja | Mutasi) = $masa_kerja2 / $jumMutasi = $p_masa_kerja_mutasi</p>
      <p>P($kategori_masa_kerja | PHK) = $masa_kerja3 / $jumPHK = $p_masa_kerja_phk</p>
      <p>P($kategori_usia | Promosi) = $usia1 / $jumPromosi = $p_usia_promosi</p>
      <p>P($kategori_usia | Mutasi) = $usia2 / $jumMutasi = $p_usia_mutasi</p>
      <p>P($kategori_usia | PHK) = $usia3 / $jumPHK = $p_usia_phk</p>
      <p>P($kategori_nilai_pelatihan | Promosi) = $nilai_pelatihan1 / $jumPromosi = $p_nilai_pelatihan_promosi</p>
      <p>P($kategori_nilai_pelatihan | Mutasi) = $nilai_pelatihan2 / $jumMutasi = $p_nilai_pelatihan_mutasi</p>
      <p>P($kategori_nilai_pelatihan | PHK) = $nilai_pelatihan3 / $jumPHK = $p_nilai_pelatihan_phk</p>
      <p>P($kategori_nilai_kinerja | Promosi) = $nilai_kinerja1 / $jumPromosi = $p_nilai_kinerja_promosi</p>
      <p>P($kategori_nilai_kinerja | Mutasi) = $nilai_kinerja2 / $jumMutasi = $p_nilai_kinerja_mutasi</p>
      <p>P($kategori_nilai_kinerja | PHK) = $nilai_kinerja3 / $jumPHK = $p_nilai_kinerja_phk</p>
      <h2>Langkah 3: Mengkalikan semua hasil P(X|Ci) sesuai dengan kelasnya</h2>
      <p>P(X | Promosi) = $p_masa_kerja_promosi * $p_usia_promosi * $p_nilai_pelatihan_promosi * $p_nilai_kinerja_promosi = $paPromosi;
      <p>P(X | Mutasi) = $p_masa_kerja_mutasi * $p_usia_mutasi * $p_nilai_pelatihan_mutasi * $p_nilai_kinerja_mutasi = $paMutasi;
      <p>P(X | PHK) = $p_masa_kerja_phk * $p_usia_phk * $p_nilai_pelatihan_phk * $p_nilai_kinerja_phk = $paPHK;
      <h2>Langkah 4 : Mengkalikan hasil P(X|Ci) dengan P(Ci)</h2>
      <p>P(Promosi) = $p_x_promosi * $p_promosi = $p_fix_promosi;
      <p>P(Mutasi) = $p_x_mutasi * $p_mutasi = $p_fix_mutasi;
      <p>P(PHK) = $p_x_phk * $p_phk = $p_fix_phk = $p_fix_phk;
      </div>
  </div>
";

$result = $obj->perbandingan($paPromosi,$paMutasi,$paPHK);

if($paPromosi > $paMutasi && $paPromosi > $paPHK){
  echo "<br>
  <h3 class='tebal'>PRESENTASE <span class='badge badge-success' style='padding:10px'><b>PROMOSI</b></span> LEBIH BESAR DARI PADA PRESENTASE MUTASI DAN PHK</h3><br>";
  echo "<h4><br>Presentase promosi sebanyak : <b>".round($result[1],2)." %</b> <br>Presentase mutasi sebanyak : <b>".round($result[2],2)." % </b> <br>Presentase phk sebanyak : <b>".round($result[3],2)." % </b></h4>";
}
if($paMutasi > $paPromosi && $paMutasi > $paPHK){
  echo "<br>
  <h3 class='tebal'>PRESENTASE <span class='badge badge-warning' style='padding:10px'><b>MUTASI</b></span> LEBIH BESAR DARI PADA PRESENTASE PROMOSI DAN PHK</h3><br>";
  echo "<h4><br>Presentase promosi sebanyak : <b>".round($result[1],2)." %</b> <br>Presentase mutasi sebanyak : <b>".round($result[2],2)." % </b> <br>Presentase phk sebanyak : <b>".round($result[3],2)." % </b></h4>";
}
if($paPHK > $paPromosi && $paPHK > $paMutasi){
  echo "<br>
  <h3 class='tebal'>PRESENTASE <span class='badge badge-danger' style='padding:10px'><b>PHK</b></span> LEBIH BESAR DARI PADA PRESENTASE PROMOSI DAN MUTASI</h3><br>";
  echo "<h4><br>Presentase promosi sebanyak : <b>".round($result[1],2)." %</b> <br>Presentase mutasi sebanyak : <b>".round($result[2],2)." % </b> <br>Presentase phk sebanyak : <b>".round($result[3],2)." % </b></h4>";
}


if($result[0] == "PROMOSI"){
  echo "
  <div class='mt-5 alert alert-success' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Selamat! berdasarkan hasil prediksi, anda mendapatkan <b> PROMOSI!</b></p>
  </div>";
}
if($result[0] == "MUTASI"){
  echo"
  <div class='mt-5 alert alert-warning' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Maaf, berdasarkan hasil prediksi, anda mendapatkan <b>MUTASI!</p>
  </div>";
}
if($result[0] == "PHK"){
  echo"
  <div class='mt-5 alert alert-danger' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Maaf, berdasarkan hasil prediksi, anda mendapatkan <b>PHK!</p>
  </div>";
}

 ?>
