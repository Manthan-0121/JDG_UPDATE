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

}
