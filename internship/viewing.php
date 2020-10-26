<?php
include('includes/connection.php');

setcookie('login', $_POST['login']);
setcookie('password', $_POST['password']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <?php

    // $_SESSION['test'] = "Сессия - тест";
    // echo $_SESSION['test'];

    $_SESSION['login'] = $_COOKIE['login'];
    $_SESSION['password'] = $_COOKIE['password'];

    // var_dump($_SESSION['login']);
    // var_dump($_SESSION['password']);

    // $_SESSION['login'] = 'admin';
    // $_SESSION['password'] = 'admin';
    // echo $_SESSION['login'];
    // echo $_SESSION['password'];

    $_SESSION['passwordHash'] = password_hash('admin', PASSWORD_DEFAULT);

    $_SESSION['passwordResult'] = password_verify($_SESSION['password'], $_SESSION['passwordHash']);

    if ($_SESSION['passwordResult'] && $_SESSION['login'] == 'admin') {
        ?>
            <header>
                <div class="header__container">
                    <form action="username.php" method="POST">
                        <p class="output__label">Найти позьзователя по User Name</p>
                        <input type="text" pattern="[a-zA-Z]*[0-9]*" placeholder="User Name" required name="username"
                            class="output__form">
                        <input type="submit" value="Найти позьзователя">
                    </form>
                    <form action="email.php" method="POST">
                        <p class="output__label">Найти позьзователя по E-mail</p>
                        <input type="email" placeholder="E-mail" required name="email" class="output__form">
                        <input type="submit" value="Найти позьзователя">
                    </form>
                    <form action="date.php" method="POST">
                        <p class="output__label">Найти позьзователя по дате оправки</p>
                        <p class="output__label">Формат поиска: 2020-10-13 21:16:27</p>
                        <input type="datetime" placeholder="Date" required name="date" class="output__form">
                        <input type="submit" value="Найти позьзователя">
                    </form>
                </div>
            </header>
            <section class="output">
                <div class="output__container paralax">
                    <?php

                    $per_page = 25;
                    $page = 1;

                    if (isset($_GET['page'])) {
                        $page = (int)$_GET['page'];
                    }

                    $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `form`");
                    $total_count = mysqli_fetch_assoc($total_count_q);
                    $total_count = $total_count['total_count'];

                    $total_pages = ceil($total_count / $per_page);

                    if ($page < +1 || $page > $total_pages) {
                        $page = 1;
                    }

                    $offset = ($per_page * $page) - $per_page;

                    $messages = mysqli_query($connection, "SELECT * FROM `form` ORDER BY `id` DESC LIMIT $offset,$per_page");

                    $messages_exist = true;

                    if (mysqli_num_rows($messages) <= 0) {
                        echo "На этой странице статей не существует!";
                        $messages_exist = false;
                    }

                    while ($mes = mysqli_fetch_assoc($messages)) {

                        ?>

                        <div class="output__block">
                            <p class="output__item">Username пользователя: <?php echo $mes['username']; ?></p>
                            <p class="output__item">E-mail пользователя: <?php echo $mes['e-mail']; ?></p>
                            <p class="output__item">Homepage пользователя: <?php echo $mes['homepage']; ?></p>
                            <p class="output__item">Text пользователя: <?php echo $mes['text']; ?></p>
                            <img src="/img/<?php echo $mes['image_name']; ?>" alt="" class="preview__img">
                            <p class="output__item">IP пользователя: <?php echo $mes['ip']; ?></p>
                            <p class="output__item">Browser пользователя: <?php echo $mes['browser']; ?></p>
                            <p class="output__item">Дата оправки: <?php echo $mes['date']; ?></p>
                        </div>

                        <?php
                    }

                    if (mysqli_num_rows($messages) > 0) {
                        echo '<div class="output_paginator">';
                        if ($page > 1) {
                            echo '<a href="/viewing.php?page=' . ($page - 1) . '" class="output__btn">&laquo; Прошлая страница</a> ';
                        }
                        if ($page < $total_pages) {
                            echo '<a href="/viewing.php?page=' . ($page + 1) . '" class="output__btn">Следующая страница &raquo;</a>';
                        }
                        echo '<div/>';
                    }
                    ?>
                </div>
            </section>
        <?php 
    } else {
        ?>

            <div class="error">
                <p class="error__text">ПАСАСИ</p>
            </div>

        <?php
    }

    ?>
</body>
</html>
