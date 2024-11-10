<?php
// Enter your code here, enjoy!

$a = [1,2,3,4,1=>6];
var_dump($a);


var_dump((int)null);

function findMedianSortedArrays($arr1, $arr2) {
	/*$a = array_map(
            function($arr) {
            if ($length = count($arr)%2) {
                return ($arr[$length/2 - 1] + $arr[$length/2])/2.0;
            } else {
                return $arr[floor($length/2)];
            }
            },
            [$s, $p]
        );*/


	$l1 = count($arr1) - 1;
	$l2 = count($arr2) - 1;
	$a = 0;
	$b = 0;
	$list = [];

	

	//var_dump([$l1, $l2]);
	while ($a <= $l1 || $b <= $l2) {
		var_dump([$a, $b]);
		$el1 = $arr1[$a]; // 1
		$el2 = $arr2[$b]; // 2

		if ($a <= $l1 && $b <= $l2) {
			if ($el1 <= $el2) {
				array_push($list, $el1); // list: 1
				$a++; // a = 1
				continue;
			} else {
				array_push($list, $el2);
				$b++; 
				continue;
			}
		}
		

		if ($a > $l1) {
			var_dump("!");
			array_push($list, ...array_slice($arr2, $b));
			break;
		}

		if ($b > $l2) {
			var_dump("!!!");
			array_push($list, ...array_slice($arr1, $a)); break;
		}
	}
	var_dump("--------");
	var_dump($list);

	if ($length = count($list)%2) {
		var_dump(($list[$length/2 - 1] + $list[$length/2])/2.0); exit;
		return ($list[$length/2 - 1] + $list[$length/2])/2.0;
	} else {
		return $list[floor($length/2)];
	}

}

function findMedianSortedArrays1($arr1, $arr2) {
        $l1 = count($arr1) - 1;
        $l2 = count($arr2) - 1;
        $a = 0;
        $b = 0;
        $list = [];

        while ($a <= $l1 || $b <= $l2) {
        	

            if ($a > $l1) {
                array_push($list, ...array_slice($arr2, $b));
                break;
            }

            if ($b > $l2) {
                array_push($list, ...array_slice($arr1, $a)); break;
            }
            
            $el1 = $arr1[$a]; // 1
            $el2 = $arr2[$b]; // 2

            if ($a <= $l1 && $b <= $l2) {
                if ($el1 <= $el2) {
                    array_push($list, $el1);
                    $a++;
                    continue;
                } else {
                    array_push($list, $el2);
                    $b++; 
                    continue;
                }
            }
        }
        var_dump($list);
		$length = count($list);
        if ($length%2 == 0) {
            return ($list[$length/2 - 1] + $list[$length/2])/2.0;
        } else {
            return $list[floor($length/2)];
        }
    }

var_dump(findMedianSortedArrays1([1, 2], [3, 4]));