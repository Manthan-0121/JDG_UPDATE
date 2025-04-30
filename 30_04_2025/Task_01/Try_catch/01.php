<?php
function checkNum($number)
{
    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}
try {
    checkNum(2);
    echo 'If you see this, the number is 1 or below';
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


function demmo_checkNum($number = null)
{
    if ($number === null) {
        throw new Exception('Number is required');
    }
    return ++$number;
}

try {
    demmo_checkNum(); // This will now throw "Number is required"
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


// try {
//     $d = 10 / 0;
//     echo $d;
//     throw new Exception('Not divisible by zero');
// } catch (Exception $e) {
//     echo '' . $e->getMessage();
// }
echo "hello";
echo "<br>";

function two_num_sum($a = null, $b = null)
{
    if ($a === null || $b === null) {
        throw new Exception("Two numbers are required");
    }
    return $a + $b;
}
echo "<br>";
try {
    echo two_num_sum(5, 3);
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}

try{
    echo two_num_sum();
}catch(Exception $e){
    echo 'Message: '. $e->getMessage();
}