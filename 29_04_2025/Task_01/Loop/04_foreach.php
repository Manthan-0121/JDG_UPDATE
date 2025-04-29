<?php
// The foreach Loop on Arrays
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
    echo "$x <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// Keys and Values
$person = array("name" => "Manthan", "age" => 23, "city" => "Rajkot");

foreach ($person as $key => $value) {
    echo "Key: $key; Value: $value <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// The foreach Loop on Objects
class Car
{
    public $color;
    public $model;
    public function __construct($color, $model)
    {
        $this->color = $color;
        $this->model = $model;
    }
}
$myCar = new Car("red", "Volvo");
foreach ($myCar as $x => $y) {
    echo "$x: $y <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// The break Statement
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
    if ($x == "blue") break;
    echo "$x <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// The continue Statement
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
    if ($x == "blue") continue;
    echo "$x <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// Foreach Byref
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
    if ($x == "blue") $x = "pink";
}

var_dump($colors);
echo "<br>";
echo "<br>";
echo "<br>";
// Alternative Syntax
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
  echo "$x <br>";
endforeach;
