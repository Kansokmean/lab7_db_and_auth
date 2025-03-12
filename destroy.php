<?php
require_once 'config/database.php';
require_once 'library/library.php';
    $tbname = 'users';
    $criteria = "id" ;
    $values = 3;
    $labseven = new labSeven();

    $labseven ->delete($tbname, $criteria, $values);
