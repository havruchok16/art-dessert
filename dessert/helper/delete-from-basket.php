<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require_once 'W:/domains/dessert/database/connect.php';

        $basket_id = filter_var(trim($_POST['basket_id']));

        $result = $db->query("DELETE FROM basket WHERE basket_id = '$basket_id'");

        if($result) {
            header('Location: http://dessert/views/cart/cart.php');
        } else {
            echo var_dump($_POST);
            echo "Something went wrong!";
        }
        //Шоколадный чизкейк 2 18
    }
?>