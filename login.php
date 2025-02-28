<?php
require_once 'config/database.php';
require_once 'library/library.php';
$tbname = "users";
$username = "kansokmean@gmail.com";
$pass = "12345";
$labseven = new labSeven();
$labseven->login($tbname, $username, $pass);
