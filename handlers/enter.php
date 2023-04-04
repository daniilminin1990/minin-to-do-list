<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

$login = $_POST['login'];
$password = $_POST['password'];


$sql = "SELECT `id`, `email`, `password`, `firstname`
        FROM `users`
        WHERE 
            `email` = '$login' AND
            `password` = '$password';";

// Отправка запроса (запрашиваю данные из БД)
$query = $pdo->query($sql);

// Преобразовывю данные из таблицы в объект
$user = $query->fetch(PDO::FETCH_OBJ);

if($user) {
    // Функция создает куки файл
    setcookie('user', $user->id, time() + 3600 * 24 * 7, '/');
} else {
    echo '<h1>Пользователь не найден</h1>';
}
header('Location: /');
?>
