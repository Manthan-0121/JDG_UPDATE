<?php
$rows = 5;

for ($i = 1; $i <= $rows; $i++) { // 1 2 3 4 5
    for ($j = 1; $j <= $rows - $i; $j++) { //1; 1<=(5-1=4)
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) { //1; 1<=1,2,3,4,5;
        echo "* ";
    }
    echo "<br>";
}