<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/function.php';

// Header
path('components/Header');
// echo '<h1 style="color:orange;">ТЕКСТ</h1>'; 

if(isset($_COOKIE['user'])) : 
    // echo '<h1 style="color:green;">Привет</h1>';
    path('components/AddTask');
    path('components/Tasks');
else:
    path('components/Login'); //Внимание - тут не пишем Слэш перед адресом, потому что в функции он уже есть.
endif;

// Footer
path('components/Footer');

// echo '<h1 style="color:orange;">ТЕКСТ ПРОВЕРКА КОНЦА</h1>'; ?>