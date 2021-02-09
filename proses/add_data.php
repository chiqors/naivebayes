<?php
include_once("../connect.php");
$nama = $_POST['nama_pegawai'];
$usia = $_POST['usia'];
$mk = $_POST['masa_kerja'];
$np = $_POST['nilai_pelatihan'];
$nk = $_POST['nilai_kinerja'];
$hasil = $_POST['hasil_evaluasi'];

$sql = "INSERT INTO data_latih VALUES ('$nama','$mk','$usia','$np','$nk','$hasil')";
$res = $conn->query($sql);
if ($sql) {
    if ($conn->affected_rows > 0)
        header("Location: ../data_latih.php");
    else
        echo "Gagal menambahkan data";
}
