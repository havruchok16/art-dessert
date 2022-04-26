<?php
    session_start();

    require 'W:/domains/dessert/database/connect.php';

    $sort_id = !empty($_POST['price']) ? trim($_POST['price']) : 0;
    $category_id = !empty($_POST['category']) ? trim($_POST['category']) : 0;
    
    $sql = "SELECT * from dessert";
    
    if ($category_id != 0 && $sort_id == 0) {
        $sql .= " WHERE category_id = $category_id";
    } else if($category_id == 0 && $sort_id != 0) {
        $order_value = $sort_id == 1 ? 'ASC' : 'DESC';
        $sql .= " ORDER BY price $order_value";
    } else if($category_id != 0 && $sort_id != 0) {
        $order_value = $sort_id == 1 ? 'ASC' : 'DESC';
        $sql .= " WHERE category_id = $category_id ORDER BY price $order_value";
    }
    
    $result = mysqli_query($db, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // header('Location: http://dessert/views/dessert/dessert.php');
?>