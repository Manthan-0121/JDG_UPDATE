<?php
$role = "editor";

switch ($role) {
    case "admin":
        echo "Full access granted.";
        break;
    case "editor":
        echo "Can edit content.";
        break;
    case "subscriber":
        echo "Can view content.";
        break;
    default:
        echo "Guest access only.";
}