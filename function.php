<?php
// Classes
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Task.php';

function path($file, $item = '')
{
    require $_SERVER['DOCUMENT_ROOT'] . '/' . $file . '.php';
}
// Config
path('config');

function user_info($val = 'id') 
{
    // ДОПИСАЛ УСЛОВИЕ. В противном случае если пользователь выйдет, а куки нет, то будет ошибка на сайте
    if ( isset ($_COOKIE['user'])) {
    //здесь будет отправляться некий запрос, где можгу получть информацию о пользователе из БД, имеется ввиду будет отправляться SQL запрос
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE `id` = $_COOKIE[user];"; //ID из COOKIE, где собственно и хранится ID пользователя
    $query = $pdo->query($sql);
    $user = $query->fetch(PDO::FETCH_OBJ);
    // отправляю запрос и возвращаю, преобразую данные в объект.
    //теперь с помощью return могу возвращать объект и использовать только те данные, которые мне нужны, в данном случае ID, который по умолчанию задал в function user_info($val = 'id')
    //вместо ID смогу подставлять и другое значение, какие есть в COOKIE, т.е. в таблице USERS. Например имя, или фамилию, или емэйл, или пароль. user_info($val = firstname)
    return $user->$val;
    }
    return false;
}

function get_tasks() {
    $tasks = new Task();
    return $tasks->get_tasks();
}