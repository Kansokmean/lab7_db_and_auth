<?php
require_once 'config/database.php';
require_once 'library/library.php';
    $tbname = 'users';
    $labseven = new labSeven();

    $labseven ->getAll($tbname);
