<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$task = new Task();
$task->done($_GET['id'], $_GET['done']);
?>