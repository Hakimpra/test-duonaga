<?php
if (! function_exists('addDigit')) {
    function addDigit($number, $delimiter = '.') {
        $number = (string) $number;
        $strlen = strlen($number);
        $digit = floor($strlen/3);
        $newNumber ='';
        $j = 0;
        for ($i=($strlen-1); $i >= 0 ; $i--) {
            $j++;
            if ($j===3 AND !($i===0)) {
                $j = 0;
                $newNumber = $delimiter.$number[$i].$newNumber;
            } else {
                $newNumber = $number[$i].$newNumber;
            }
        }
        return $newNumber;
    }
}