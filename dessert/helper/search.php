<?php

    if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['form_id'] == 2) {
        require 'W:/domains/dessert/database/connect.php';

        $search = !empty($_POST['search_line']) ? mysqli_real_escape_string($db, $_POST['search_line']) : null;
        
        $sql = "SELECT * from dessert WHERE `name` LIKE '%$search%' OR composition LIKE '%$search%'";

        $result = mysqli_query($db, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0) {
            $searchRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            
        }
    }

?>