<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$task = new Task();
$task->update($_GET['id'], $_GET['heading'], $_GET['date'], $_GET['count_day']);
?>