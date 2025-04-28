<?php

echo "<br>";
$a = "Hello";
$$a = "World";
echo "$a <br> ${$a}";
echo "<br>";

$userType = "admin";
$admin = "Administrator";
$guest = "Visitor";

// Using $$ to dynamically choose which variable to access
echo $$userType;  // Outputs: Administrator (because $userType = "admin" → $admin)
// $Visitor = "Visitor";
echo "<br>";
echo $$guest; // give error because $guest is not defined as a variable
