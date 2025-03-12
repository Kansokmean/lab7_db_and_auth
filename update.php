<?php
require_once 'config/database.php';
require_once 'library/library.php';
    $tbname = 'users';
    $criteria = "id" ;
    $values = 3;
    $labseven = new labSeven();
    
    $newdata = [
        "username" => "udated@gmail.com",
        "password" => password_hash("new123", PASSWORD_BCRYPT)
    ];
    $labseven ->update($tbname, $newdata, $criteria, $values);
