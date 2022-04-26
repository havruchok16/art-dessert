<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require 'W:/domains/dessert/database/connect.php';

        $name = filter_var(trim($_POST['name']));
        $category_id = !empty($_POST['category']) ? trim($_POST['category']) : 0;
        $price = filter_var(trim($_POST['price']));
        $composition = filter_var(trim($_POST['composition']));

        $result = $db->query("INSERT INTO `dessert` (`name`, `category_id`, `price`, `composition`)
            VALUES('$name','$category_id','$price','$composition')");

        if($result) {
            header('Location: http://dessert/views/admin/products.php');
        } else {
            echo "Something went wrong!";
        }
        //Шоколадный чизкейк 2 18
    }
?>