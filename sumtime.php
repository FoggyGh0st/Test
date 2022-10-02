<?php

function sumTime(string $getTime1, string $getTime2): string
{
    $fullCheck = ' 0123456789:';
    $dateOne = [];
    $dateTwo = [];
    $result = [];
    foreach (str_split($getTime1) as $char) {
        if (!(strpos($fullCheck, $char))) {
            return 'Input error!';
        }
    }
    $dateOne = explode(':', $getTime1);
    foreach (str_split($getTime2) as $char) {
        if (!(strpos($fullCheck, $char))) {
            return 'Input error!';
        }
    }
    $dateTwo = explode(':', $getTime2);
    $result[0] = (intval($dateOne[0])) + (intval($dateTwo[0]));
    $result[1] = (intval($dateOne[1])) + (intval($dateTwo[1]));
    $result[2] = (intval($dateOne[2])) + (intval($dateTwo[2]));
    if ((intval($result[2])) > 59) {
        $result[1] = (intval($result[1])) + 1;
        $result[2] = (intval($result[2])) - 60;
    }
    if ((intval($result[1])) > 59) {
        $result[0] = (intval($result[0])) + 1;
        $result[1] = (intval($result[1])) - 60;
    }
    if ((intval($result[0])) > 24) {
        $result[0] = (intval($result[0])) - 24;
    }
    return "$result[0]:$result[1]:$result[2]";
}

echo sumTime($argv[1], $argv[2]);
