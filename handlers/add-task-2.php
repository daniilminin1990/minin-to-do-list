<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$task = new Task();
$task->add($_GET['name_task'], $_GET['count_day']);

$id_user = user_info();

$sql = "SELECT * FROM `tasks`
        WHERE `id` = (
            SELECT MAX(id) FROM `tasks` WHERE `id_user` = '$id_user'
        );";
$query = $pdo->query($sql);
$new_task = $query->fetch(PDO::FETCH_OBJ);

path('components/Task', $new_task);