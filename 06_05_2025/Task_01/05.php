<?php
$row = 7;

for ($i = 1; $i <= $row; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
        if($j == 5) break;
    }
    for ($k = 1; $k <= $i+5; $k--) {
        echo "* ";
    }
    echo "<br>";
}
