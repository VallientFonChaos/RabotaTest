<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <script defer src="/view/js/jquery-3.6.1.min.js"></script>
    <script defer src="/view/js/main.js"></script>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="view/css/main.css">
</head>
    <body>
        <form action="connect/registerConnect.php" method="post">
            <label>Name</label>                
             <p class="msgname"></p>
            <input type="text" name="name" placeholder="Введите свое полное имя">  <br/>
            <label>Login</label>
            <p class="msglog"></p>
            <input type="text" name="login" placeholder="Введите свой логин"> <br/>
            <label>Password</label>
                         <p class="msgpas"></p>
            <input type="password" name="password" placeholder="Введите свой пароль"> <br/>
            <label>Confirm Password</label>
             <p class="msgCpas"></p>
            <input type="password" name="passwordConfirm" placeholder="Подтвердите свой пароль"> <br/>
            <label>Email</label>
                         <p class="msgemail"></p>
            <input type="email" name="email" placeholder="Введите свою электронную почту"> <br/>
            <button type="submit" name="do_register" class="register-btn">Зарегистрироваться</button>
                <p>
                    Если у вас есть аккаунт, пожалуйста <a href="/login.php">авторизируйтесь</a>!
                </p>
                <p class="msg"></p>
        </form>
    </body>
</html>

