<?php
function calculator($argv): string
{
    $numberarr = [];
    $sarr = [];
    $tempstring = '';
    $sum = 0;
    $fullcheck = '0123456789+-';
    $numbercheck = '0123456789';
    foreach (str_split($argv[1]) as $char) {
        if (!(strpos($fullcheck, $char))) {
            return 'Error!';
        } else {
            if (strpos($numbercheck, $char)) {
                $tempstring .= $char;
            } else {
                $sarr[] = $char;
                $numberarr[] = intval($tempstring);
                $tempstring = '';
            }
        }
    }
    $numberarr[] = intval($tempstring);
    foreach ($sarr as $key => $value) {
        if ($key === 0) {
            if ($value === '-') {
                $sum -= $numberarr[$key] - $numberarr[$key - 1];
            }
            if ($value === '+') {
                $sum += $numberarr[$key] + $numberarr[$key + 1];
            }
        } else {
            if ($value === '+') {
                $sum += $numberarr[$key + 1];
            }
            if ($value === '-') {
                $sum -= $numberarr[$key + 1];
            }
        }
    }
    return ($sum);
}
echo calculator($argv);
