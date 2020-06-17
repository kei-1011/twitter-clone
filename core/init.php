<?php
require_once 'database/connection.php';
require_once 'classes/user.php';
require_once 'classes/follow.php';
require_once 'classes/tweet.php';


global $pdo;

session_start();

$getFromU = new User($pdo);
$getFromT = new Tweet($pdo);
$getFromF = new Follow($pdo);

define("BASE_URL","http://localhost/twitter-clone/");
