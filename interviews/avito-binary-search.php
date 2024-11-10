<?php
$haystack = [0, 1, 2, 3, 33, 44, 54, 56, 67, 68, 71, 73, 82, 89, 90, 99, 100]; 

/**
 * @param array[] $commits - двумерный массив.
 * Элементы массива являются ассоциативным массивом с ключами buildTime и hash.
 * @param int $thresholdTime - пороговое время
 * @return string
 */
function searchElement(array $commits, int $thresholdTime): int|false {
    $left = 0;
    $right = count($commits) - 1;

    if ($commits[0] >= $thresholdTime) {
            return $commits[0];
        }
    if ($commits[$right] < $thresholdTime) {
            return false;
        }

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($commits[$mid] == $thresholdTime && $commits[$mid-1] != $commits[$mid]) {
            return $commits[$mid];
        }

        if ($commits[$mid] > $thresholdTime) {
            $right = $mid - 1;
        }
        else {
            $left = $mid + 1;
        }
    }

    for ($i = max([min([$left, $right, $mid]) - 1, 0]); $i <= min([max([$left, $right, $mid]) + 1, count($commits)]) ; $i++) {
        if ($commits[$i] >= $thresholdTime) {
            return $commits[$i];
        }
    }

    return false;
}

function searchElement1(array $haystack, int $value):int|false {
    $begin = 0;
    $end = count($haystack) - 1;
    $middle = intval(ceil($end / 2));
    
    if ($value > $haystack[$end] || $value < $haystack[$begin]) {
        return false;
    }
    
    while (!(($end == $middle) || ($middle == $begin))) {
        //var_dump([$begin, $end, $middle]);
        if ($value > $haystack[$middle]) {
            $begin = $middle + 1;
        } elseif ($value < $haystack[$middle]) {
            $end = $middle - 1;
        } elseif ($end == $middle && $value == $haystack[$begin]) {
            return $middle - 1;
        } else {
            return $middle;
        }
        $middle = intval(ceil(($begin + $end) / 2));
        //var_dump([$begin, $end, $middle]);
    }
    return false;
}
