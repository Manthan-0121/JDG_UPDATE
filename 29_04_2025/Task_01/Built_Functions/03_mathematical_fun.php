<?php
// Basic Arithmetic Operations
echo 5 + 3;   
echo "<br>";
echo 5 - 3;   
echo "<br>";
echo 5 * 3;   
echo "<br>";
echo 5 / 3;   
echo "<br>";
echo 5 % 3;   
echo "<br>";
echo 5 ** 3;  
echo "<br>";


// Number Handling Functions

echo "<br>";
echo abs(-5);
echo "<br>";
echo ceil(3.2);
echo "<br>";
echo floor(3.8);
echo "<br>";
echo round(3.5);
echo "<br>";
echo round(3.4);
echo "<br>";
echo intval(4.9);
echo "<br>";
echo floatval(5);
echo "<br>";
if(is_numeric("Manthan")){
    echo "Yes";
}else{
    echo "No";
}
echo "<br>";
if(is_numeric("123")){
    echo "Yes";
}else{
    echo "No";
}
echo "<br>";


// Power and Logarithmic Functions

echo "<br>";
echo pow(2, 3); //2*2*2
echo "<br>";
echo sqrt(16);
echo "<br>";
echo sqrt(12);
echo "<br>";
echo exp(1);
echo "<br>";
echo log(10);
echo "<br>";
echo log10(100);
echo "<br>";


// Trigonometric Functions

echo "<br>";
echo sin(M_PI/2);
echo "<br>";
echo cos(M_PI/2);
echo "<br>";
echo tan(M_PI/4);
echo "<br>";
echo asin(1);
echo "<br>";
echo acos(1);
echo "<br>";
echo atan(1);
echo "<br>";
echo deg2rad(90);
echo "<br>";
echo rad2deg(M_PI);
echo "<br>";


// Random Number Generation

echo "<br>";
echo rand(1,10);
echo "<br>";
echo mt_rand(1,10);
echo "<br>";
echo random_int(1, 100);
echo "<br>";
echo lcg_value();
echo "<br>";


// Number Formatting

echo "<br>";
echo number_format(1234123.4841585, 2,".",",");
echo "<br>";
echo sprintf("%.2f", 123.456);
echo "<br>";


// Mathematical Constants
echo "<br>";
echo M_PI;
echo "<br>";
echo M_E;
echo "<br>";
echo M_LOG2E;
echo "<br>";
echo M_LN2;
echo "<br>";
echo INF;
echo "<br>";
echo NAN;
echo "<br>";

// Advanced Math Functions

echo "<br>";
echo max(1, 2, 3);
echo "<br>";
echo min(1, 2, 3);
echo "<br>";
echo hypot(6, 4);
echo "<br>";
echo fmod(5.7, 1.3);
echo "<br>";
if(is_finite(INF)){
    echo "True";
}else{
    echo "False";
}
echo "<br>";
if(is_infinite(INF) ){
    echo "True";
}else{
    echo "False";
}

?>