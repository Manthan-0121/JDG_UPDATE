<?php
setcookie("username", "Manthan", time() + 7);

if (isset($_COOKIE['username'])) {
    echo "Welcome back, " . $_COOKIE['username'] . "!";
} else {
    echo "Hello, new visitor!";
}
echo "<br>";
print_r($_COOKIE);

