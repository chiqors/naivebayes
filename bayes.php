<?php
class Bayes
{
  private $pegawai = "data2.json";
  // private $jumTrue = 0;
  // private $jumFalse = 0;
  // private $jumData = 0;

  function __construct()
  {

  }

  /*================================================================
  FUNCTION SUM PROMOSI, MUTASI DAN PHK
  =================================================================*/
  function sumPromosi()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == "PROMOSI"){
        $t += 1;
      }
    }

    return $t;
  }

  function sumMutasi()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == "MUTASI"){
        $t += 1;
      }
    }
    return $t;
  }

  function sumPHK()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == "PHK"){
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probMasaKerja($masa_kerja,$hasil_evaluasi)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['masa_kerja'] == $masa_kerja && $hasil['hasil_evaluasi'] == $hasil_evaluasi){
        $t += 1;
      }
    }
    return $t;
  }

  function probUsia($usia,$hasil_evaluasi)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['usia'] == $usia && $hasil['hasil_evaluasi'] == $hasil_evaluasi){
        $t += 1;
      }
    }
    return $t;
  }

  function probNilaiPelatihan($nilai_pelatihan,$hasil_evaluasi)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['nilai_pelatihan'] == $nilai_pelatihan && $hasil['hasil_evaluasi'] == $hasil_evaluasi){
        $t += 1;
      }
    }
    return $t;
  }

  function probNilaiKinerja($nilai_kinerja,$hasil_evaluasi)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['nilai_kinerja'] == $nilai_kinerja && $hasil['hasil_evaluasi'] == $hasil_evaluasi){
        $t += 1;
      }
    }
    return $t;
  }

  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sP   : jumlah data yang bernilai promosi ( sumPromosi )
  $sM   : jumlah data yang bernilai mutasi ( sumMutasi )
  $sK   : jumlah data yang bernilai phk ( sumPHK )
  $sD   : jumlah data pada data latih ( sumData )
  $pMK   : jumlah probabilitas masa kerja ( probMasaKerja )
  $pU   : jumlah probabilitas usia ( probUsia )
  $pNP  : jumlah probabilitas nilai pelatihan ( probNilaiPelatihan )
  $pNK   : jumlah probabilitas nilai kinerja ( probNilaiKinerja )
  ==================================================================*/

  function hasilPromosi($sP = 0 , $sD = 0 , $pMK = 0 ,$pU = 0, $pNP = 0,$pNK)
  {
    $paPromosi = $sP / $sD;
    $p1 = $pMK / $sP;
    $p2 = $pU / $sP;
    $p3 = $pNP / $sP;
    $p4 = $pNK / $sP;
    $hsl = $paPromosi * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function hasilMutasi($sM = 0 , $sD = 0 , $pMK = 0 ,$pU = 0, $pNP = 0,$pNK)
  {
    $paMutasi = $sM / $sD;
    $p1 = $pMK / $sM;
    $p2 = $pU / $sM;
    $p3 = $pNP / $sM;
    $p4 = $pNK / $sM;
    $hsl = $paMutasi * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function hasilPHK($sK = 0 , $sD = 0 , $pMK = 0 ,$pU = 0, $pNP = 0,$pNK)
  {
    $paPHK = $sK / $sD;
    $p1 = $pMK / $sK;
    $p2 = $pU / $sK;
    $p3 = $pNP / $sK;
    $p4 = $pNK / $sK;
    $hsl = $paPHK * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function perbandingan($pAPromosi,$pAMutasi,$pAPHK)
  {
    if($pAPromosi > ($pAMutasi || $pAPHK)){
      $hasil_evaluasi = "PROMOSI";
      $hitung = ($pAPromosi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $diterima = 100 - $hitung;
    }
    if($pAMutasi > ($pAPromosi || $pAPHK)){
      $hasil_evaluasi = "MUTASI";
      $hitung = ($pAMutasi / ($pAMutasi + $pAPromosi + $pAPHK)) * 100;
      $diterima = 100 - $hitung;
    }
    if($pAPHK > ($pAPromosi || $pAMutasi)){
      $hasil_evaluasi = "PHK";
      $hitung = ($pAPHK / ($pAPHK + $pAPromosi + $pAMutasi)) * 100;
      $diterima = 100 - $hitung;
    }

    $hsl = array($hasil_evaluasi,$hitung,$diterima);
    return $hsl;
  }
  //=================================================================
}

?>