<?php

namespace App\Traits;

trait AppUtilities
{
  public function dateConvertInt($dates)
  {
    $tanggal = date('d', $dates);
    $bulan = date('m', $dates);
    $tahun = date('Y', $dates);
    $waktu = date('H:i', $dates);
    $namabulan = null;
    switch ($bulan) {
      case '1':
        $namabulan = "Januari";
        break;
      case '2':
        $namabulan = "Februari";
        break;
      case '3':
        $namabulan = "Maret";
        break;
      case '4':
        $namabulan = "April";
        break;
      case '5':
        $namabulan = "Mei";
        break;
      case '6':
        $namabulan = "Juni";
        break;
      case '7':
        $namabulan = "Juli";
        break;
      case '8':
        $namabulan = "Agustus";
        break;
      case '9':
        $namabulan = "September";
        break;
      case '10':
        $namabulan = "Oktober";
        break;
      case '11':
        $namabulan = "November";
        break;
      case '12':
        $namabulan = "Desember";
        break;
      default:
        $namabulan = "";
        break;
    }
    $lengkap = $tanggal . ' ' . $namabulan . ' ' . $tahun . ' ' . $waktu;
    return $lengkap;
  }
  public function dateConvert($date)
  {
    $tanggal = date('d', strtotime($date));
    $bulan = date('m', strtotime($date));
    $tahun = date('Y', strtotime($date));
    $waktu = date('H:i', strtotime($date));
    $namabulan = null;
    switch ($bulan) {
      case '1':
        $namabulan = "Januari";
        break;
      case '2':
        $namabulan = "Februari";
        break;
      case '3':
        $namabulan = "Maret";
        break;
      case '4':
        $namabulan = "April";
        break;
      case '5':
        $namabulan = "Mei";
        break;
      case '6':
        $namabulan = "Juni";
        break;
      case '7':
        $namabulan = "Juli";
        break;
      case '8':
        $namabulan = "Agustus";
        break;
      case '9':
        $namabulan = "September";
        break;
      case '10':
        $namabulan = "Oktober";
        break;
      case '11':
        $namabulan = "November";
        break;
      case '12':
        $namabulan = "Desember";
        break;
      default:
        $namabulan = "";
        break;
    }
    $lengkap = $tanggal . ' ' . $namabulan . ' ' . $tahun . ' ' . $waktu;
    return $lengkap;
  }
  public function minuteConvert($tglselesai, $tanggalnow)
  {
    # code...
  }
}
