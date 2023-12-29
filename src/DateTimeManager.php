<?php

namespace Imadepurnamayasa\PhpImpyCore;

class DateTimeManager {
    private $dateTime;

    public function __construct($dateTimeString = 'now') {
        $this->dateTime = new \DateTime($dateTimeString);
    }

    public function getCurrentDateTime() {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    public function addDays($days) {
        $interval = new \DateInterval('P' . abs($days) . 'D');
        if ($days < 0) {
            $this->dateTime->sub($interval);
        } else {
            $this->dateTime->add($interval);
        }
    }

    public function differenceInDays($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%a');
    }

    public function differenceInMonths($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%m');
    }

    public function differenceInYears($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%y');
    }

    public function differenceInHours($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%H');
    }

    public function differenceInMinutes($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%i');
    }

    public function differenceInSeconds($otherDateTime) {
        $otherDate = new \DateTime($otherDateTime);
        $interval = $this->dateTime->diff($otherDate);
        return $interval->format('%r%S');
    }
}
