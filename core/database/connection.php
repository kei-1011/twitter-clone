<?php
$dsn  = 'mysql:dbname=tweety;host=localhost;charset=utf8mb4';
$user = 'root';
$pass = 'root';

try {
  $pdo = new PDO($dsn,$user,$pass);

} catch (PDOException $e) {
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage());
}
