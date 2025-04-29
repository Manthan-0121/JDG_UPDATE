<?php

// simple while loop
$i = 1;
while ($i < 6) {
    echo $i;
    echo "<br>";
    $i++;
}
echo "<br>";
echo "<br>";
echo "<br>";
// The break Statement
$i = 1;
while ($i < 6) {
    if ($i == 3) break;
    echo $i;
    echo "<br>";
    $i++;
}
echo "<br>";
echo "<br>";
echo "<br>";
// The continue Statement
$i = 0;
while ($i < 6) {
    $i++;
    if ($i == 3) continue;
    echo "<br>";
    echo $i;
}
echo "<br>";
echo "<br>";
echo "<br>";
// Alternative Syntax
$i = 1;
while ($i < 6):
    echo $i;
    echo "<br>";
    $i++;
endwhile;
