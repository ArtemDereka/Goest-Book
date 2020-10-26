<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style/reset.css">
    <link rel="stylesheet"  href="style/style.css">
    <title>Document</title>
</head>
<body>
    
    <div class="preview" id="preview">


    <?php
        include('includes/connection.php');

        $img_name = $_FILES['image']['name'];


        $uploadfile = __DIR__ . "/img/" . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.";
        } else  {
            echo "dolboeb artem";
        }

        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $homepage = strip_tags($_POST['homepage']);
        $text = strip_tags($_POST['text']);
        $date = date('Y-m-d H:i:s');
        $ip = strip_tags($_POST['ip']);
        $browser = strip_tags($_POST['browser']);

        $result = mysqli_query($connection, "INSERT INTO `form`(`username`, `e-mail`, `homepage`, `text`, `image_name`, `date`, `ip`, `browser`) VALUES ('$username', '$email', '$homepage', '$text', '$img_name', '$date', '$ip', '$browser')");

        if ($result) {
            
            ?>
                        
                <div class="preview__content">
                    <p class="preview__text"> <?php echo "Текстовые данные успешно сохранены! <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "Вы отправили: <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "User Name: $username <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "E-mail: $email <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "Homepage: $homepage <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "Text: $text <br>"; ?> </p>
                    <img src="<?php echo "img/" . $img_name; ?>" alt="" class="preview__img">
                    <p class="preview__text"> <?php echo "Image Name: $img_name <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "Дата оправки: $date <br>"; ?> </p>
                    <p class="preview__text"> <?php echo "Вернуться на предыдущую страницу" ?> <a href=" <?php echo $_SERVER['HTTP_REFERER']; ?> " class="preview__link">Назад</a> </p>
                </div> 

            <?php
        }
        else {
            echo "При отправке произошла ошибка, пожалуйста повторите попытку. Вернуться на предыдущую страницу ";
            ?> <a href=" <?php echo $_SERVER['HTTP_REFERER']; ?> ">Назад</a> <?php
        }



        
    ?>

    </div>
    <script src="/js/vanta.net.min.js"></script>
<script src="/js/three.r119.min.js"></script>
<script src="/js/vanta.halo.min.js"></script>

<script>

    VANTA.HALO({
    el: "#preview",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    baseColor: 0x1eff00,
    backgroundColor: 0x0,
    amplitudeFactor: 2.40,
    size: 3.00
    })

</script>
</body>
</html>



