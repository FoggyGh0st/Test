<?php
function calculator( $argv): string
{
    $numberArr = [];
    $sArr = [];
    $tempString = '';
    $sum = 0;
    $fullCheck = '0123456789+-';
    $numberCheck = '0123456789';
    foreach (str_split($argv[1]) as $char) {
        if (!(strpos($fullCheck, $char))) {
            return 'Error!';
        } else {
            if (strpos($numberCheck, $char)) {
                $tempString .= $char;
            } else {
                $sArr[] = $char;
                $numberArr[] = intval($tempString);
                $tempString = '';
            }
        }
    }
    $numberArr[] = intval($tempString);
    foreach ($sArr as $key => $value) {
        if ($key === 0) {
            if ($value === '-') {
                $sum -= $numberArr[$key] - $numberArr[$key - 1];
            }
            if ($value === '+') {
                $sum += $numberArr[$key] + $numberArr[$key + 1];
            }
        } else {
            if ($value === '+') {
                $sum += $numberArr[$key + 1];
            }
            if ($value === '-') {
                $sum -= $numberArr[$key + 1];
            }
        }
    }
    return ($sum);
}
echo calculator($argv);
