<?php
function getDataLatih()
{
    $conn = mysqli_connect("localhost", "root", "", "naivebayes");
    $sql = "SELECT * FROM data_latih";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($nama, $mk, $usia, $np, $nk, $hasil);
    $response = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['nama_pegawai'] = $nama;
        $temp['masa_kerja'] = $mk;
        $temp['usia'] = $usia;
        $temp['nilai_pelatihan'] = $np;
        $temp['nilai_kinerja'] = $nk;
        $temp['hasil_evaluasi'] = $hasil;
        array_push($response, $temp);
    }
    return json_encode($response);
}