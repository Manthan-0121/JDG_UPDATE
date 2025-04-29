<?php
declare(strict_types=1);

// this function is represent a return only hello world
function myMessage()
{
    echo "Hello world!";
}
myMessage();
echo "<br>";
echo "<br>";
echo "<br>";

// PHP Function Arguments
function demoMessage($name)
{
    echo "Hello $name!";
}
demoMessage("Manthan");
echo "<br>";
echo "<br>";
echo "<br>";

// PHP Default Argument Value
function setHeight($minheight = 50)
{
    echo "The height is : $minheight <br>";
}
setHeight(350);
setHeight();
setHeight(135);
echo "<br>";
echo "<br>";
echo "<br>";

// PHP Functions - Returning values
function sum($x, $y)
{
    $z = $x + $y;
    return $z;
}
echo "5 + 10 = " . sum("5", "10") . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4);
echo "<br>";
echo "<br>";
echo "<br>";

// Passing Arguments by Reference
function add_five(&$value, $x, $y)
{
    return $value += 5 + $x + $y;
}

$num = 2;
add_five($num, 10, 20);
echo $num;
echo "<br>";
echo "<br>";
echo "<br>";

// Variable Number of Arguments
function sumMyNumbers(...$x)
{
    return array_sum($x);
}
$a = sumMyNumbers(5, 2, 6, 2, 7, 7, 8, 10);
echo $a;
echo "<br>";
echo "<br>";
echo "<br>";

function myFamily($lastname, ...$firstname)
{
    $txt = "";
    $len = count($firstname);
    for ($i = 0; $i < $len; $i++) {
        $txt = $txt . "Hi, $firstname[$i] $lastname.<br>";
    }
    return $txt;
}

$a = myFamily("Mistry", "Manthan", "Sagar");
echo $a;
echo "<br>";
echo "<br>";
echo "<br>";

// PHP is a Loosely Typed Language

function addNumbers(int $a, int $b)
{
    return $a + $b;
}
echo addNumbers(5, 5);
echo "<br>";
echo "<br>";
echo "<br>";

// PHP Return Type Declarations

 // strict requirement
function addNumbers1(float $a, float $b): float
{
    return $a + $b;
}
echo addNumbers1(1.2, 5.2);
