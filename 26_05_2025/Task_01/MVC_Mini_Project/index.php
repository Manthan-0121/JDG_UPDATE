<?php
require_once 'controllers/UserController.php';
require_once 'controllers/BlogController.php';
require_once 'controllers/DemoController.php';

if (isset($_GET['page']) == "blog") {
    if (isset($_GET['blog_id']) == "blog_1") {
        $blogController = new BlogController();
        $blogController->showBlog($_GET['blog_id']);
    } else {
        echo "Blog not found.";
    }
} elseif (isset($_GET['page']) === "demo") {
    $demoController = new DemoController();
    $demoController->showDemo();
} elseif (isset($_GET['page']) === "user") {
    $demoController = new DemoController();
    $demoController->showDemo();
} else {
    $userController = new UserController();
    $userController->index();
}
