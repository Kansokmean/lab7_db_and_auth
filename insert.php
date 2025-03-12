<?php
require_once 'config/database.php';
require_once 'library/library.php';
    $tbname = 'users';
    $labseven = new labSeven();
    $users = [
        ["username" => "kansokmean@gmail.com", "password" => password_hash("12345", PASSWORD_BCRYPT)],
        ["username" => "dararoth@gmail.com", "password" => password_hash("abc123", PASSWORD_BCRYPT)],
        ["username" => "chanvita@gmail.com", "password" => password_hash("abcd", PASSWORD_BCRYPT)]
    ];
    foreach ($users as $user) {
        $labseven ->create($tbname, $user);
    }
    
