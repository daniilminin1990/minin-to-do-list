<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$thema = $_GET['thema'];
$user_id = user_info();
//Ссылаюсь на функцию user_info из файла function.php, через переменную, потому что в запросе функции писать нельзя

$sql = "UPDATE `users` SET `thema` = '$thema' WHERE `id` = $user_id";
//Т.к. столбец id у нас int, т.е. числовой, то могу писать без кавычек
$prepare = $pdo->prepare($sql);
//Запрос подготавливается, сохраняется в переменную $prepare
$prepare->execute();
//Запрос отправляется, когда мы применяем метод execute;
