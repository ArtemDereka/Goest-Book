<?php
setcookie('login', $_POST['login']);
setcookie('password', $_POST['password']);

var_dump($_COOKIE);

if($_COOKIE['login'] == 'admin' && $_COOKIE['password'] == 'admin') {
    echo "done";
} else {
    echo "nea";
}

// session_start();

// echo $_SESSION['name'];

?>