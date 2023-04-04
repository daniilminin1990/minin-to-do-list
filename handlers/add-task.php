<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$task = new Task();
$task->add($_GET['name_task'], $_GET['count_day']);
?>
