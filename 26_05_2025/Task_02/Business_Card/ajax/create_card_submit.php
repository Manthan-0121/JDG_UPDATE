<?php
require_once '../config.php';

foreach ($_POST as $key => $value) {
    if (is_array($value)) {
        $_POST[$key] = array_map('trim', $value);
    } else {
        $_POST[$key] = trim($value);
    }
}

echo "Done";
?>