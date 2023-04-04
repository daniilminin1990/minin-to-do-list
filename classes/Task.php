<?php

class Task
{
    function __construct()
    {

    }

    function get_tasks() 
    {
        $user_id = user_info();
        $tasks_array = [];

        global $pdo;
        $query_tasks = $pdo->query(
            "SELECT * FROM `tasks` 
                WHERE `id_user` = '$user_id'
                ORDER BY `id` DESC"
        );

        while($task = $query_tasks->fetch(PDO::FETCH_OBJ)) {
            $tasks_array[] = $task;
        }
        return $tasks_array;
    }
    
    // Добавление задачи
    function add($name_task, $count_day) 
    {
        $id_user = user_info();
        global $pdo;
        $sql = "INSERT INTO `tasks`
                    (name_task, date_start, count_day, `id_user`)
                VALUES
                    ('$name_task', CURDATE(), '$count_day', '$id_user')";
        $prepare = $pdo->prepare("$sql");
        $prepare->execute();
    }

    // Выполнение задачи
    function done($id, $done) 
    {
        global $pdo;
        $sql = "UPDATE `tasks` 
                SET `done` = '$done'
                WHERE `id` = '$id'";

        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }

    // Изменение задачи
    function update($id, $heading, $date, $countDay) 
    {
        global $pdo;
        $sql = "UPDATE `tasks`
                SET 
                    `name_task` = '$heading',
                    `date_start` = '$date',
                    `count_day` = '$countDay'
                WHERE `id` = '$id'";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }

    // Удаление задачи
    function delete($id) 
    {
        global $pdo;
        $sql = "DELETE FROM `tasks` WHERE 'id' = '$id'";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }
}