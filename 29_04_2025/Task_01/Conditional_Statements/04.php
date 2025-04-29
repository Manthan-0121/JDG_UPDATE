<?php
$temperature = 28;
$isSummer = true;

if ($temperature > 30 && $isSummer) {
    echo "It's very hot! Stay hydrated.";
} elseif ($temperature > 25 || $isSummer) {
    echo "It's warm outside.";
} else {
    echo "The weather is pleasant.";
}