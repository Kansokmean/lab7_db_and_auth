<?php
require_once 'database.php';
require_once 'library.php';
    $tbname = 'users';
    $criteria = "id" ;
    $values = 3;
    $labseven = new labSeven();

    // $users = [
    //     ["username" => "kansokmean@gmail.com", "password" => password_hash("12345", PASSWORD_BCRYPT)],
    //     ["username" => "dararoth@gmail.com", "password" => password_hash("abc123", PASSWORD_BCRYPT)],
    //     ["username" => "chanvita@gmail.com", "password" => password_hash("abcd", PASSWORD_BCRYPT)]
    // ];
    // foreach ($users as $user) {
    //     $labseven ->create($tbname, $user);
    // }
    
    $labseven ->login($tbname, "kansokmean@gmail.com","12345");

    // $newdata = [
    //     "username" => "udated@gmail.com",
    //     "password" => password_hash("new123", PASSWORD_BCRYPT)
    // ];
    // $labseven ->update($tbname, $newdata, $criteria, $values);


    // $labseven ->delete($tbname, $criteria, $values);

    // $labseven ->getOne($tbname, $criteria, $values);

    // $labseven ->getAll($tbname);
