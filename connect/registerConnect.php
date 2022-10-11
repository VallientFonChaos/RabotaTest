<?php
   session_start();
   
$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$json = file_get_contents('JSON/datebase.json');    
$array = json_decode($json, JSON_FORCE_OBJECT);                                           
$step = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);  


$json2 = file_get_contents('JSON/datebase.json');    
$array2 = json_decode($json2,TRUE);    


// $num = count($array);
// for ($i=0; $i < $num; $i++) { 
//     if($array[$i]['login'] === $login) {
//              $_SESSION['message'] = 'Такой Логин есть';
//     header('Location: ../register.php');
//     die('Такой Логин есть');
// } }


// $num = count($array);
// for ($i=0; $i < $num; $i++) { 
//     if($array[$i]['email'] === $email) {
//              $_SESSION['message'] = 'Такой Email есть';
//     header('Location: ../register.php');
//     die('Такой Email есть');
// } }



if (!preg_match("/^[a-zа-яё][a-zа-яё]*[a-zа-яё]$/i", $name)) {
      $response = [
        "status" => false,
        "message" => 'Поле с именем должно состоять из латинских букв'
    ];

    echo json_encode($response);
    die();
}

if (mb_strlen($name) < 2 ) {
    $_SESSION['messageName'] = 'Поле с именем должно иметь не мение 2 букв, но не более 3';
    header('Location: ../register.php');
    die('Поле с именем должно иметь не мение 2 букв, но не более 3');
}

if (mb_strlen($name) > 3) {
    $_SESSION['messageName'] = 'Поле с именем должно иметь не мение 2 букв, но не более 3';
    header('Location: ../register.php');
    die('Поле с именем должно иметь не мение 2 букв, но не более 3');
}

if (!preg_match("/^[a-zа-яё\d][a-zа-яё\d]*[a-zа-яё\d]$/i", $login)) {
      $response = [
        "status" => false,
        "message" => 'Поле с логином не должно иметь пробелов'
    ];

    echo json_encode($response);
    die();
}

if (mb_strlen($login) < 6) {
    $_SESSION['messageLogin'] = 'Поле с логином должно иметь не мение 6 символов';
    header('Location: ../register.php');
    die('Поле с логином должно иметь не мение 6 символов');
} 

if (!preg_match("/^[a-zа-яё\d][a-zа-яё\d]*[a-zа-яё\d]$/i", $password)) {
      $response = [
        "status" => false,
        "message" => 'Поле с паролем должно состоять из латинских букв и цифр'
    ];

    echo json_encode($response);
    die();
}

if (mb_strlen($password) < 6) {
      $response = [
        "status" => false
    ];

    echo json_encode($response);
    die();
} 

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = [
        "status" => false,
        "message" => 'Поле с email введен не правильно'
    ];

    echo json_encode($response);
    die();
}

if($password === $passwordConfirm){

} else {
      $response = [
        "status" => false,
        "message" => 'пароли не совпадают'
    ];

    echo json_encode($response);
    die();
}

$password = md5($password);


// if (in_array($step, $array)) {
//       $response = [
//         "status" => false,
//         "message" => 'Такой пользователь есть'
//     ];
//     echo json_encode($response);
// } else {
//     $array[] = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);        
//     file_put_contents('JSON/datebase.json', json_encode($array, JSON_FORCE_OBJECT));
//        $response = [
//         "status" => true
//     ];
//     echo json_encode($response);
// }




$num = count($array);
$a = 0;
$b = 0;

for ($i=0; $i < $num; $i++) {
   if($array[$i]['login'] === $login) {
      $a=$a+1;  
      $response = [
        "status" => false,
        "message" => 'Такой login есть'
    ];

    echo json_encode($response);
    die();
   }
}

for ($i=0; $i < $num; $i++) {
   if($array[$i]['email'] === $email) {
      $b=$b+1;  
      $response = [
        "status" => false,
        "message" => 'Такой email есть'
    ];

    echo json_encode($response);
    die();
   }
}


if ($b == 0 && $a == 0) {
    $array[] = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);        
    file_put_contents('JSON/datebase.json', json_encode($array, JSON_FORCE_OBJECT));
       $response = [
        "status" => true
    ];

    echo json_encode($response);

} 


?>
