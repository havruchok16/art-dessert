<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        session_start();
        require 'W:/domains/dessert/database/connect.php';

        $user_id = $_SESSION['user']['id'];
        $dream = filter_var(trim($_POST['dream']));
        $address = filter_var(trim($_POST['address']));

        require 'W:/domains/dessert/helper/output-basket.php';
        
        $order_id = rand(25, 10000);
        
        foreach($rowsBasket as $rows) {
            $basket_id = $rows['basket_id'];
            $cost = $rows['dessert_price'];
            var_dump($rows);
            $resultInsert = $db->query("INSERT INTO `orders` (`basket_id`, `order_id`, `date`, `address`, `cost`, `dream`)
                VALUES('$basket_id', '$order_id', now(), '$address', '$cost', '$dream')");
            $resultDelete = $db->query("DELETE FROM basket WHERE `basket_id` = '$basket_id'");
            
        }

        if($resultInsert) {
            header('Location: http://dessert/views/dessert/dessert.php');
        } else {
            echo "Something went wrong!";
        }
    }
?>