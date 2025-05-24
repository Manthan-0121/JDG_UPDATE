<?php
require_once 'controllers/UserController.php';

$controller = new UserController();
$controller->index();

if (isset($_GET['action']) && $_GET['action'] === 'demo') {
    $controller->demo();
}
?>