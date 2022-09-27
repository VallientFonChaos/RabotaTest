<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <script defer src="/view/js/jquery-3.6.1.min.js"></script>
    <script defer src="/view/js/main.js"></script>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="view/css/main.css">
    </head>
    <body>
        <form action="connect/loginConnect.php" method="post">
            <label>Login</label>
                         <p class="msglog"></p>
            <input type="text" name="login" placeholder="Введите свое полное имя"> <br/>
            <label>Password</label>
                         <p class="msgpas"></p>
            <input type="password" name="password" placeholder="Введите свой пароль"> <br/>
            <button type="submit" class="login-btn">Авторизация</button>
                <p>
                    Если у вас нету аккаунта, пожалуйста <a href="/register.php">зарегистрируетесь</a>!
                </p><p class="msg"></p>
        </form>
    </body>
</html>