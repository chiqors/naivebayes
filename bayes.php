<?php
class Bayes
{
  private $pegawai = "data.json";
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
    $hasil = $this->categorizeJSON();

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['hasil_evaluasi'] == "PROMOSI"){
        $t += 1;
      }
    }

    return $t;
  }

  function sumMutasi()
  {
    $hasil = $this->categorizeJSON();

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['hasil_evaluasi'] == "MUTASI"){
        $t += 1;
      }
    }
    return $t;
  }

  function sumPHK()
  {
    $hasil = $this->categorizeJSON();

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['hasil_evaluasi'] == "PHK"){
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $hasil = $this->categorizeJSON();
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probMasaKerja($masa_kerja,$hasil_evaluasi)
  {
    $hasil = $this->categorizeJSON();
    $masa_kerja = $this->categorize($masa_kerja, "MK");

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
    $hasil = $this->categorizeJSON();
    $usia = $this->categorize($usia, "U");

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
    $hasil = $this->categorizeJSON();
    $nilai_pelatihan = $this->categorize($nilai_pelatihan, "NP");

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
    $hasil = $this->categorizeJSON();
    $nilai_kinerja = $this->categorize($nilai_kinerja, "NK");

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
    if($pAPromosi > $pAMutasi && $pAPromosi > $pAPHK){
      $hasil_evaluasi = "PROMOSI";
      $hitung1 = ($pAPromosi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung2 = ($pAMutasi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung3 = ($pAPHK / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
    }
    if($pAMutasi > $pAPromosi && $pAMutasi > $pAPHK){
      $hasil_evaluasi = "MUTASI";
      $hitung1 = ($pAPromosi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung2 = ($pAMutasi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung3 = ($pAPHK / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
    }
    if($pAPHK > $pAPromosi && $pAPHK > $pAMutasi){
      $hasil_evaluasi = "PHK";
      $hitung1 = ($pAPromosi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung2 = ($pAMutasi / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
      $hitung3 = ($pAPHK / ($pAPromosi + $pAMutasi + $pAPHK)) * 100;
    }

    $hsl = array($hasil_evaluasi,$hitung1,$hitung2,$hitung3);
    return $hsl;
  }
  //=================================================================

  function categorizeJSON()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    foreach($hasil as &$value) {
      if ($value['masa_kerja'] >= 0 && $value['masa_kerja'] <= 10) {
        $value['masa_kerja'] = 1;
      } else if ($value['masa_kerja'] >= 11 && $value['masa_kerja'] <= 20) {
        $value['masa_kerja'] = 2;
      } else if ($value['masa_kerja'] >= 21 && $value['masa_kerja'] <= 30) {
        $value['masa_kerja'] = 3;
      }

      if ($value['usia'] >= 25 && $value['usia'] <= 35) {
        $value['usia'] = 4;
      } else if ($value['usia'] >= 36 && $value['usia'] <= 45) {
        $value['usia'] = 5;
      } else if ($value['usia'] >= 46 && $value['usia'] <= 55) {
        $value['usia'] = 6;
      }

      if ($value['nilai_pelatihan'] >= 50 && $value['nilai_pelatihan'] <= 65) {
        $value['nilai_pelatihan'] = 7;
      } else if ($value['nilai_pelatihan'] >= 66 && $value['nilai_pelatihan'] <= 85) {
        $value['nilai_pelatihan'] = 8;
      } else if ($value['nilai_pelatihan'] >= 86 && $value['nilai_pelatihan'] <= 100) {
        $value['nilai_pelatihan'] = 9;
      }

      if ($value['nilai_kinerja'] >= 50 && $value['nilai_kinerja'] <= 65) {
        $value['nilai_kinerja'] = 10;
      } else if ($value['nilai_kinerja'] >= 66 && $value['nilai_kinerja'] <= 85) {
        $value['nilai_kinerja'] = 11;
      } else if ($value['nilai_kinerja'] >= 86 && $value['nilai_kinerja'] <= 100) {
        $value['nilai_kinerja'] = 12;
      }
    }
    return $hasil;
  }

  function categorize($value, $type)
  {
    if ($type == "MK") {
      if ($value >= 0 && $value <= 10) {
        $value = 1;
      } else if ($value >= 11 && $value <= 20) {
        $value = 2;
      } else if ($value >= 21 && $value <= 30) {
        $value = 3;
      }
    } else if ($type == "U") {
      if ($value >= 25 && $value <= 35) {
        $value = 4;
      } else if ($value >= 36 && $value <= 45) {
        $value = 5;
      } else if ($value >= 46 && $value <= 55) {
        $value = 6;
      } 
    } else if ($type == "NP") {
      if ($value >= 50 && $value <= 65) {
        $value = 7;
      } else if ($value >= 66 && $value <= 85) {
        $value = 8;
      } else if ($value >= 86 && $value <= 100) {
        $value = 9;
      }
    } else if ($type == "NK") {
      if ($value >= 50 && $value <= 65) {
        $value = 10;
      } else if ($value >= 66 && $value <= 85) {
        $value = 11;
      } else if ($value >= 86 && $value <= 100) {
        $value = 12;
      }
    }
    return $value;
  }
}

?>