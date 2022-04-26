<?php

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        session_start();
        require 'W:/domains/dessert/database/connect.php';

        $user_id = $_SESSION['user']['id'];
        $dessert_name = filter_var(trim($_POST['name']));
        $dessert_price = filter_var(trim($_POST['price']));
        $image = filter_var(trim($_POST['image']));

        $result = $db->query("INSERT INTO `basket` (`user_id`, `creation_date`, `delivery_date`, `dessert_name`, `dessert_price`, `image`)
            VALUES('$user_id', now(), now(), '$dessert_name', '$dessert_price', '$image')");

        if($result) {
            header('Location: http://dessert/views/dessert/dessert.php');
        } else {
            echo "Something went wrong";
            echo var_dump($result);
        }
    }

?>