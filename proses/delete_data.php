<?php
include_once("../connect.php");
$nama = $_GET['nama'];
$usia = $_GET['usia'];
$mk = $_GET['mk'];

if (mysqli_query($conn, "DELETE FROM data_latih WHERE nama_pegawai = '$nama' AND usia = '$usia' AND  masa_kerja = '$mk'"))
    header("Location: ../data_latih.php");
else
    echo "Gagal menghapus data";

