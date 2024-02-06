<?php

namespace Imadepurnamayasa\PhpInti;

class Terbilang
{
    private $kata;

    public function __construct()
    {
        $this->kata = array(
            '0' => 'Nol',
            '1' => 'Satu',
            '2' => 'Dua',
            '3' => 'Tiga',
            '4' => 'Empat',
            '5' => 'Lima',
            '6' => 'Enam',
            '7' => 'Tujuh',
            '8' => 'Delapan',
            '9' => 'Sembilan',
            '10' => 'Sepuluh',
            '11' => 'Sebelas',
            '12' => 'Dua Belas',
            '13' => 'Tiga Belas',
            '14' => 'Empat Belas',
            '15' => 'Lima Belas',
            '16' => 'Enam Belas',
            '17' => 'Tujuh Belas',
            '18' => 'Delapan Belas',
            '19' => 'Sembilan Belas',
            '20' => 'Dua Puluh',
            '30' => 'Tiga Puluh',
            '40' => 'Empat Puluh',
            '50' => 'Lima Puluh',
            '60' => 'Enam Puluh',
            '70' => 'Tujuh Puluh',
            '80' => 'Delapan Puluh',
            '90' => 'Sembilan Puluh'
        );
    }

    public function konversi($angka)
    {
        if ($angka < 0 || $angka > 999999999999999) {
            return 'Angka melewati batas (0 - 999999999999999)';
        }

        $hasil = '';

        // Triliun
        $triliun = floor($angka / 1000000000000);
        if ($triliun > 0) {
            $hasil .= $this->konversiKelompok($triliun) . ' Triliun ';
            $angka %= 1000000000000;
        }

        // Miliar
        $miliar = floor($angka / 1000000000);
        if ($miliar > 0) {
            $hasil .= $this->konversiKelompok($miliar) . ' Miliar ';
            $angka %= 1000000000;
        }

        // Juta
        $juta = floor($angka / 1000000);
        if ($juta > 0) {
            $hasil .= $this->konversiKelompok($juta) . ' Juta ';
            $angka %= 1000000;
        }

        // Seribu
        $seribu = floor($angka / 1000);
        if ($seribu > 0) {
            $hasil .= $this->konversiKelompok($seribu) . ' Seribu ';
            $angka %= 1000;
        }

        // Seratus
        $seratus = floor($angka / 100);
        if ($seratus > 0) {
            $hasil .= $this->kata[$seratus] . ' Seratus ';
            $angka %= 100;
        }

        // Sepuluh dan nol
        if ($angka > 0) {
            if ($angka < 20) {
                $hasil .= $this->kata[$angka];
            } else {
                $hasil .= $this->kata[floor($angka / 10) * 10] . ' ' . $this->kata[$angka % 10];
            }
        }

        return trim($hasil);
    }

    private function konversiKelompok($angka)
    {
        $hasil = '';

        // Sepuluh dan nol
        if ($angka > 0) {
            if ($angka < 20) {
                $hasil .= $this->kata[$angka];
            } else {
                $hasil .= $this->kata[floor($angka / 10) * 10] . ' ' . $this->kata[$angka % 10];
            }
        }

        return $hasil;
    }
}
