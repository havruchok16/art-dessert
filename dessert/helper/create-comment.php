<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        session_start();
        require 'W:/domains/dessert/database/connect.php';

        $user_id = $_SESSION['user']['id'];
        $username = $_SESSION['user']['username'];
        $comment_text = filter_var(trim($_POST['comment_text']));

        $result = $db->query("INSERT INTO `comment` (`user_id`, `comment_text`, `username`, `create_date`)
        VALUES('$user_id','$comment_text', '$username', now())");

        if($result) {
            header('Location: http://dessert/views/dessert/dessert.php');
        } else {
            echo "Something went wrong!";
        }
    }
?>