<?php
    require 'W:/domains/dessert/database/connect.php';
    session_start();

    if(!empty($_SESSION['user'])) {
        $username = filter_var(trim($_POST['username']));
        $email = filter_var(trim($_POST['email']));
        $address = filter_var(trim($_POST['address']));
        $phone = filter_var(trim($_POST['phone']));

        $result = $db->query("UPDATE user SET `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `username` = '$username'");

        $userQuery = $db->query("SELECT * FROM `user` WHERE `username` = '$username'");
        $user = $userQuery->fetch_assoc();

        if($result) {
            $_SESSION['user'] = $user;
            header('Location: http://dessert/views/account/account.php');
        } else {
            echo "Something went wrong!";
        }
    }
?>