<?php
require_once 'config/database.php';
require_once 'library/library.php';
$tbname = 'users';
$criteria = "id";
$values = 1;
$labseven = new labSeven();
$labseven ->getById($tbname, $criteria, $values);
