<?php

include('includes/connection.php');

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
<main id="record"> 
    <section class="record">
        <form action="output.php" method="POST" enctype="multipart/form-data" class="record__form">
            <div class="record__content">
                <div class="record__text_holder">
                    <p class="record__text">User Name</p>
                    <p class="record__icon">*</p>
                </div>
                <input type="text" pattern="[a-zA-Z]*[0-9]*" placeholder="User Name" required name="username"
                       class="record__item">
            </div>
            <div class="record__content">
                <div class="record__text_holder">
                    <p class="record__text">E-mail</p>
                    <p class="record__icon">*</p>
                </div>
                <input type="email" placeholder="E-mail" required name="email" class="record__item">
            </div>
            <div class="record__content">
                <p class="record__text">Homepage</p>
                <input type="url" placeholder="Homepage" name="homepage" class="record__item_not">
            </div>
            <div class="record__content">
                <div class="record__text_holder">
                    <p class="record__text">Text</p>
                    <p class="record__icon">*</p>
                </div>
                <input type="text" placeholder="Text" required name="text" class="record__item">
            </div>
            <div class="record__file_holder">
                <input type="file" name="image" accept="image/jpeg,image/png,image/gif" class="record__file">
            </div>
            <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"/>
            <input type="hidden" name="browser" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>"/>
            <input type="submit" class="record__btn">
        </form>
    </section>
    <section class="admin">
        <form action="viewing.php" method="POST" class="record__form">
            <h2 class="admin__logo">Вход в админку</h2>
            <div class="record__content">
                <div class="record__text_holder">
                    <p class="record__text">Login</p>
                    <p class="record__icon">*</p>
                </div>
                <input type="text" pattern="[a-zA-Z]*[0-9]*" placeholder="login" required name="login" class="record__item">
            </div>
            <div class="record__content">
                <div class="record__text_holder">
                    <p class="record__text">Password</p>
                    <p class="record__icon">*</p>
                </div>
                <input type="password" pattern="[a-zA-Z]*[0-9]*" placeholder="password" required name="password" class="record__item">
            </div>
            <input type="submit" name="submit" class="record__btn">
        </form>
    </section>
</main>

<script src="/js/vanta.halo.min.js"></script>
<script src="/js/three.r119.min.js"></script>
<script src="/js/vanta.net.min.js"></script>
<script>
    VANTA.NET({
        el: "#record",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        backgroundColor: 0x0
    })
</script>


</body>
</html>