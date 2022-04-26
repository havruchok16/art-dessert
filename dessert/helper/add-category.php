<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require 'W:/domains/dessert/database/connect.php';

        $name = filter_var(trim($_POST['name']));

        $result = $db->query("INSERT INTO `category` (`name`)
            VALUES('$name')");

        if($result) {
            header('Location: http://dessert/views/admin/products.php');
        } else {
            echo "Something went wrong!";
        }
    }
?>