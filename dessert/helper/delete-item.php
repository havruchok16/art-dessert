<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require_once 'W:/domains/dessert/database/connect.php';

        $id = filter_var(trim($_POST['id']));

        $result = $db->query("DELETE FROM dessert WHERE id = '$id'");

        if($result) {
            header('Location: http://dessert/views/admin/products.php');
        } else {
            echo "Something went wrong!";
        }
        //Шоколадный чизкейк 2 18
    }
?>