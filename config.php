<?php
define('HOST', 'localhost'); // тип подключения
define('DBNAME', 'todo'); // Это название базы данных
define('USERNAME', 'root');
define('PASSWORD', 'root');

global $pdo;
$dns = 'mysql: host=' . HOST . '; dbname=' . DBNAME . ';';
$pdo = new PDO($dns, USERNAME, PASSWORD);

?>