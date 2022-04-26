<?php
    session_start();
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    if(!empty($_SESSION['user'])) {
        header('Location: http://dessert/views/account/account.php');
        console_log($_SESSION);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.svg" type="image/svg">
    <title>ART dessert</title>
</head>
<?php
    include('W:\domains\dessert\views\header\header.php');
    include('W:\domains\dessert\views\registration\registration.php');
    include('W:\domains\dessert\views\footer\footer.html');
?>
</html>
<?php
    require 'W:/domains/dessert/database/connect.php';

    session_start();
    if(isset($_POST['submit'])) {
        $username = filter_var(trim($_POST['username']));
        $email = filter_var(trim($_POST['email']));
        $password = filter_var(trim($_POST['password']));
        $phone = filter_var(trim($_POST['phone']));

        if(mb_strlen($username) < 5 || mb_strlen($username) > 30){
            exit();
        }

        $password = md5($password."hashhh");

        $equalUser = $db->query("SELECT * FROM `user` WHERE `username` = '$username'");
        $equalRes = $equalUser->fetch_assoc();
        if(!empty($equalRes)) {
            $_SESSION['error_user'] = "Данный пользователь уже существует";
            exit();
        };

        $result = $db->query("INSERT INTO `user` (`username`, `email`, `phone`, `password`)
            VALUES('$username','$email','$phone','$password')");

        $userQuery = $db->query("SELECT * FROM `user` WHERE `username` = '$username' and `password` = '$password'");
        $user = $userQuery->fetch_assoc();
        if($result && $userQuery) {
            echo "Вы успешно зарегистрировались!";
            $_SESSION['user'] = $user;
            header('Location: http://dessert/views/account/account.php');
        } else {
            echo "Что-то пошло не так";
        }

        $db->close();
    } else{
        unset($_SESSION['error_user']);
    }
?>