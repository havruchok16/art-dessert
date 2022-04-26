<?php
    session_start();

    require 'W:/domains/dessert/database/connect.php';

    $sql = mysqli_query($db, "SELECT * FROM category");
    
    $rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);

?>