<?php
   session_start();
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$json = file_get_contents('connect/JSON/datebase.json');    
$array = json_decode($json,TRUE);                                           

if ($_SESSION['messageNumber']){
      $z=$_SESSION['messageNumber'];
       }

unset($_SESSION['messageNumber']);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Основная страница</title>
    <link rel="stylesheet" href="view/css/main.css">
    </head>
    <body>
        <form action="connect/loginConnect.php" method="post">
            <label>Hellow</label> <?php print_r($array[$z-1]['name']);?>
            <a href="/login.php">Выход</a>
        </form>
    </body>
</html>


