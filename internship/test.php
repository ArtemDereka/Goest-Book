<?php
// setcookie('login', 'artem');

// var_dump($_COOKIE)
session_start();

echo $_SESSION['login'] . "<br>";
echo $_SESSION['password'];

// $_SESSION['name'] = 'Artem';

// echo $_SESSION['name'];

?>