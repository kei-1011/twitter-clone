<?php
require_once 'database/connection.php';
require_once 'classes/user.php';
require_once 'classes/follow.php';
require_once 'classes/tweet.php';

ini_set('display_errors', 1);

date_default_timezone_set('Asia/Tokyo');

global $pdo;

session_start();

$getFromU = new User($pdo);
$getFromT = new Tweet($pdo);
$getFromF = new Follow($pdo);

define("BASE_URL","http://192.168.11.3:10002/");
