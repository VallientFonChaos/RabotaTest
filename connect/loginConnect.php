<?php
   session_start();
$login = $_POST['login'];
$password = $_POST['password'];
$json = file_get_contents('JSON/datebase.json');    
$array = json_decode($json,TRUE);                                           

/*if ($login === '' ) {
    $_SESSION['messageLogin'] = 'Поле с логином не должно быть пустым';
    header('Location: ../login.php');
    die('Поле с логином не должно быть пустым');
} 

if ($password === '') {
    $_SESSION['messagePassword'] = 'Поле с паролем не может быть пустым';
    header('Location: ../login.php');
    die('Поле с паролем не может быть пустым');
}
*/




$num = count($array);
$a = 0;
$b = 0;
$z = 0;
for ($i=0; $i < $num; $i++) {
   if($array[$i]['login'] === $login) {
      $a=$a+1; $z=$i+1; break;
   }
}

for ($i=0; $i < $num; $i++) {
   if($array[$i]['password'] === md5($password)) {
      $b=$b+1;  break; 
   }
}


if ($b > 0 && $a > 0) {
  // header('Location: ../profile.php');
       $response = [
        "status" => true
    ];

    echo json_encode($response);

         $_SESSION['messageNumber'] = "$z";
} else {
            $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);

}




?>










