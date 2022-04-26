<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require 'W:/domains/dessert/database/connect.php';

        $id = filter_var(trim($_POST['id']));
        $name = filter_var(trim($_POST['name']));
        $category_id = filter_var(trim($_POST['category_id']));
        $price = filter_var(trim($_POST['price']));
        $composition = filter_var(trim($_POST['composition']));

        $result = $db->query("UPDATE dessert SET `name` = '$name', `category_id` = '$category_id', 
            `price` = '$price' WHERE `id` = '$id'");

        $userQuery = $db->query("SELECT * FROM `dessert` WHERE `name` = '$name'");
        $user = $userQuery->fetch_assoc();

        if($result) {
            header('Location: http://dessert/views/admin/products.php');
        } else {
            echo "Something went wrong!";
        }
    }
?>