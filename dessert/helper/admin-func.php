<?php
    session_start();
    require 'W:/domains/dessert/database/connect.php';
    
    $sql = "SELECT * FROM dessert";
    
    $result = mysqli_query($db, $sql);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>