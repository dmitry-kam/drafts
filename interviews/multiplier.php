<?php

/**
 * Реализовать функцию умножения `multiplier (int $a, int $b): int`,
 * которая заменяет оператор `*` произведения двух чисел
 */

$list = [
    [2, 3],   // 6
    [7, 5],   // 35
    [0, 4],   // 0
    [-2, 5],  // -10
    [3, -5],  // -15
    [7, 0],   // 0
    [-9, -5], // 45
];

function multiplier (int $a, int $b):int {
    //return round($a / (1/$b));
    $positive = true;
    if (($a < 0 && $b > 0) || ($a > 0 && $b < 0)) {
        $positive = false;
    }
    $a = abs($a);
    $b = abs($b);

    if ($a % 2 == 0) {
        return $b << $a / 2;
    } elseif ($b % 2 == 0) {
        return $a << $b / 2;
    }

    $res = array_sum(array_fill(0, $b, $a));
    var_dump($a, $b, array_fill(0, $b, $a));exit;
    return $res;
    $res = 0;

    function countRes() {

    }
    //return $a << $b;
}

foreach ($list as [$a, $b]) {
    echo multiplier($a, $b) . PHP_EOL;
}
