<?php

namespace Imadepurnamayasa\PhpImpyCore\Manager;

class NumberToWords
{
    private $words;

    public function __construct()
    {
        $this->words = array(
            '0' => 'Zero',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            '11' => 'Eleven',
            '12' => 'Twelve',
            '13' => 'Thirteen',
            '14' => 'Fourteen',
            '15' => 'Fifteen',
            '16' => 'Sixteen',
            '17' => 'Seventeen',
            '18' => 'Eighteen',
            '19' => 'Nineteen',
            '20' => 'Twenty',
            '30' => 'Thirty',
            '40' => 'Forty',
            '50' => 'Fifty',
            '60' => 'Sixty',
            '70' => 'Seventy',
            '80' => 'Eighty',
            '90' => 'Ninety'
        );
    }

    public function convert($number)
    {
        if ($number < 0 || $number > 999999999999999) {
            return 'Number out of range (0 - 999999999999999)';
        }

        $result = '';

        // Trillions
        $trillions = floor($number / 1000000000000);
        if ($trillions > 0) {
            $result .= $this->convertGroup($trillions) . ' Trillion ';
            $number %= 1000000000000;
        }

        // Billions
        $billions = floor($number / 1000000000);
        if ($billions > 0) {
            $result .= $this->convertGroup($billions) . ' Billion ';
            $number %= 1000000000;
        }

        // Millions
        $millions = floor($number / 1000000);
        if ($millions > 0) {
            $result .= $this->convertGroup($millions) . ' Million ';
            $number %= 1000000;
        }

        // Thousands
        $thousands = floor($number / 1000);
        if ($thousands > 0) {
            $result .= $this->convertGroup($thousands) . ' Thousand ';
            $number %= 1000;
        }

        // Hundreds
        $hundreds = floor($number / 100);
        if ($hundreds > 0) {
            $result .= $this->words[$hundreds] . ' Hundred ';
            $number %= 100;
        }

        // Tens and ones
        if ($number > 0) {
            if ($number < 20) {
                $result .= $this->words[$number];
            } else {
                $result .= $this->words[floor($number / 10) * 10] . ' ' . $this->words[$number % 10];
            }
        }

        // Remove trailing space and return the result
        return trim($result);
    }

    private function convertGroup($number)
    {
        $result = '';

        // Tens and ones
        if ($number > 0) {
            if ($number < 20) {
                $result .= $this->words[$number];
            } else {
                $result .= $this->words[floor($number / 10) * 10] . ' ' . $this->words[$number % 10];
            }
        }

        return $result;
    }
}
