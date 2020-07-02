<?php
require_once '../core/init.php';
$getFromU->logout();
if($getFromU->loggedIn() === false) {
	header("Location: ".BASE_URL."index.php");
}

?>
