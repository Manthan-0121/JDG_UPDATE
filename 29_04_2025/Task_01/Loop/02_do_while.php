<?php
// simple do while loop
$i = 1;
do {
    echo $i;
    $i++;
} while ($i > 6);
echo "<br>";
echo "<br>";
echo "<br>";
// The break Statement
$i = 1;

do {
    if ($i == 3) break;
    echo $i;
    $i++;
} while ($i < 6);
echo "<br>";
echo "<br>";
echo "<br>";
// The continue Statement   
$i = 0;
do {
    $i++;
    if ($i == 3) continue;
    echo $i;
} while ($i < 6);
