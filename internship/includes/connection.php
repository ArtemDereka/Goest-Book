<?php
session_start();

$connection = mysqli_connect('Localhost', 'Temu4777', 'Art07112005', 'internship');

if($connection == false) {
    echo 'Не удалось подключиться к базе данных!<br>';
    echo mysqli_connect_error();
    exit();
}

?>