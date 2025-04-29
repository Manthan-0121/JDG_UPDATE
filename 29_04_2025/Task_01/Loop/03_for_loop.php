<?php
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// The break Statement
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) break;
    echo "The number is: $x <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";
// The continue Statement
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) continue;
    echo "The number is: $x <br>";
  }
