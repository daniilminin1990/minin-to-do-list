<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$task = new Task();
$task->delete($_GET['id']);
?>