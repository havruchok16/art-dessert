<?php
    session_start();
    require 'W:/domains/dessert/database/connect.php';
    $user_id = $_SESSION['user']['id'];

    $sql = "SELECT * FROM basket WHERE `user_id` = $user_id";

    $result = mysqli_query($db, $sql);
    $rowsBasket = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>