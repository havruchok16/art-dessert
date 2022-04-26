<?php
    session_start();
    require 'W:/domains/dessert/database/connect.php';
    
    $sql = "SELECT * FROM comment";
    
    $result = mysqli_query($db, $sql);

    $rowsComment = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>