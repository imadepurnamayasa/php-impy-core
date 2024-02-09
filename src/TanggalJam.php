<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti;

class TanggalJam
{
    private $tanggalJam;

    public function __construct($tanggalJamString = 'now')
    {
        $this->tanggalJam = new \DateTime($tanggalJamString);
    }

    public function sekarang()
    {
        return $this->tanggalJam->format('Y-m-d H:i:s');
    }

    public function tambahHari($hari)
    {
        $interval = new \DateInterval('P' . abs($hari) . 'D');
        if ($hari < 0) {
            $this->tanggalJam->sub($interval);
        } else {
            $this->tanggalJam->add($interval);
        }
    }

    public function selisihHari($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%a');
    }

    public function selisihBulan($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%m');
    }

    public function selisihTahun($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%y');
    }

    public function selisihJam($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%H');
    }

    public function selisihMenit($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%i');
    }

    public function selisihDetik($tanggalJamLain)
    {
        $tanggalJam = new \DateTime($tanggalJamLain);
        $interval = $this->tanggalJam->diff($tanggalJam);
        return $interval->format('%r%S');
    }
}
