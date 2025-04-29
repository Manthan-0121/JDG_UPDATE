<?php

// Array Creation & Initialization
$arr = array(1, 2, 3);
print_r($arr);

echo "<br>";
$arr1 = range(1, 5);
print_r($arr1);

echo "<br>";
$arr2 = array_fill(0, 3, 'A');
print_r($arr2);
echo '<br>';

echo '<br>';
$arr3 = array_combine(['a', 'b'], [1, 2]);
print_r($arr3);
echo '<br>';


// Array Modification


array_push($arr, 4);
array_push($arr, 5);
echo "<br>";
print_r($arr);
echo "<br>";

array_pop($arr);
echo "<br>";
print_r($arr);

echo "<br>";
array_unshift($arr, "Manthan");
echo "<br>";
print_r($arr);

echo "<br>";
array_shift($arr);
echo "<br>";
print_r($arr);

echo "<br>";
array_splice($arr, 0, 1, [9]);
echo "<br>";
print_r($arr);
echo "<br>";

// Array Access & Information


echo "<br>";
echo count($arr);
echo "<br>";

echo "<br>";
echo sizeof($arr);
echo "<br>";

echo "<br>";
echo array_key_exists("M", $arr1);
echo "<br>";
echo array_key_exists(2, $arr1);
echo "<br>";

echo "<br>";
echo in_array(2, $arr);
echo "<br>";
echo in_array("2", $arr);
echo "<br>";

echo "<br>";
echo array_search(2, $arr);
echo "<br>";
echo array_search("2", $arr);
echo "<br>";


// Array Traversal & Iteration


echo "<br>";
foreach ($arr as $val) {
    echo $val;
    echo "<br>";
};
echo "<br>";
print_r(array_map("ucfirst", ['ram', 'shyam']));
echo '<br>';

echo '<br>';
print_r(array_filter($arr, fn($n) => $n > 0));
echo '<br>';

echo '<br>';
$strarr = ["cherry", "apple", "banana"];
$numarr = ["1", "2", "3"];
print_r(array_reduce($numarr, fn($c, $i) => $c + $i));
echo "<br>";

echo '<br>';
array_walk($numarr, fn(&$n) => $n *= 2);
print_r($numarr);
echo '<br>';


// Array Sorting

echo '<br>';
sort($arr);
print_r($arr);
echo '<br>';

echo '<br>';
rsort($arr);
print_r($arr);
echo '<br>';

echo '<br>';
asort($strarr);
print_r($strarr);
echo '<br>';

echo '<br>';
arsort($strarr);
print_r($strarr);
echo '<br>';

echo '<br>';
ksort($strarr);
print_r($strarr);
echo '<br>';

echo '<br>';
krsort($strarr);
print_r($strarr);
echo '<br>';

echo '<br>';
usort($arr, fn($a, $b) => $a <=> $b);
print_r($arr);
echo "<br>";


// Array Merging & Slicing


echo '<br>';
$mrgearr = array_merge([1, 2], [3, 4]);
print_r($mrgearr);
echo '<br>';

echo '<br>';
print_r(array_merge_recursive(['a' => 1], ['a' => 2], ['b' => 3]));
echo '<br>';

echo '<br>';
$arr1 = ["a" => "apple", "b" => "banana"];
$arr2 = ["b" => "blueberry", "c" => "cherry"];
$result = array_replace($arr1, $arr2);
print_r($result);
echo "<br>";

echo '<br>';
print_r(array_slice([1,2,3,4], 0, 3));
echo "<br>";

echo '<br>';
print_r(array_chunk([1,2,3,4], 1));
echo '<br>';


// Array Keys & Values


echo '<br>';
$pairarr = ["a" => "apple", "b" => "banana"];
print_r(array_keys($pairarr));
echo "<br>";

echo "<br>";
print_r(array_values($pairarr));
echo "<br>";

echo '<br>';
print_r(array_flip($pairarr));
echo '<br>';

echo '<br>';
print_r(array_column([['id'=>1],['id'=>2],['name'=>"Manthan"]], 'name'));
echo '<br>';


// Array Comparison & Differences

$arr11 = [0=> 'Ramesh',1=> 'Ganesh',2=> 'Kanesh',3=> 'Paresh'];
$arr22 = [4=> 'Ramesh',1=> 'Ganesh',];

echo '<br>';
print_r(array_diff($arr11, $arr22));
echo '<br>';

echo '<br>';
print_r(array_diff_assoc($arr11, $arr22));
echo '<br>';

echo '<br>';
print_r(array_diff_key($arr11, $arr22));
echo '<br>';

echo '<br>';
print_r(array_intersect_assoc($arr11, $arr22));
echo '<br>';

echo '<br>';
print_r(array_intersect_key($arr11, $arr22));
echo '<br>';
