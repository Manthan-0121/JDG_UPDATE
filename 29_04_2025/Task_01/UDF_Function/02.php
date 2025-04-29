<?php
function greetUser($name)
{
    echo "Hello $name!<br>";
}

greetUser("Manthan");
echo "<br>";
echo "<br>";

function squareNumber($number)
{
    return $number * $number;
}

echo "The square of 5 is: " . squareNumber(5);
echo "<br>";
echo "<br>";

function calculateTotal($price, $quantity, $tax)
{
    $subtotal = $price * $quantity;
    $tax_amount = $subtotal * ($tax / 100);
    return $subtotal + $tax_amount;
}

echo "The total cost is: " . calculateTotal(100, 20, 8);
echo "<br>";
echo "<br>";

function welcomeMessage($message, $language = "English")
{
    return "Welcome, $message! ($language)";
}
echo welcomeMessage("John Doe");
echo "<br>";
echo welcomeMessage("John Doe", "Gujarati");
echo "<br>";
echo "<br>";

$siteurl = __FILE__;
function displaySiteURL(){
    $site_url = "Demo.php";
    global $dmvar;
    $dmvar = "DM";
    return $site_url;
}
displaySiteURL();
echo $siteurl;
echo "<br>";
echo displaySiteURL();
echo "<br>";
echo $dmvar;

echo "<br>";
echo "<br>";

function clickCounter(){
    static $count = 0;
    $count++;
    echo "Page visited $count times.";
}
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
clickCounter();
echo "<br>";
echo "<br>";

function greet() { 
    return "Hello Manthan!";
}

function callGreet() {
    return greet(). " How are you?";
}
echo callGreet();
echo "<br>";
echo "<br>";

function isAdult(int $age){
    if($age < 18){
        return false;
    }else{
        return true;
    }
}
if(isAdult(20)){
    echo "You are an adult.";
}else{
    echo "You are not an adult.";
}

echo "<br>";
echo "<br>";

function sumArray(...$numbers){
    return array_sum($numbers);
}

echo sumArray(1, 2, 3, 4, 5);
echo "<br>";