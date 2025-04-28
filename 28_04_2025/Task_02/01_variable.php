<?php
$globalVar = "This is a global variable.";
function myFunction()
{
    $name = "John Doe";
    $localVar = "This is a local variable.";
    echo $localVar;
    echo "<br>";
    echo $GLOBALS['globalVar'];
}
// echo $name; // This will cause an error because $name is not defined in this scope
myFunction();
echo "<br>";
echo $globalVar;

echo "<br>";
static $staticVar = "This is a static variable.";
echo "<br>";
echo $staticVar;
echo "<br>";
$staticVar = "This is a new static variable.";
echo "<br>";
echo $staticVar;
