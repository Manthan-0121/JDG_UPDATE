<?php
require_once 'models/User.php';

class UserController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();
        require 'views/userList.php';
    }

    public function demo()
    {
        echo "Hello Manthan, this is a demo page for the MVC framework.<br>";
    }
}
