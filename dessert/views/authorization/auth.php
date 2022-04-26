<?php
    session_start();

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    if(!empty($_SESSION['user'])) {
        header('Location: http://dessert/views/account/account.php');
        console_log($_SESSION);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.svg" type="image/svg">
    <title>ART dessert</title>
</head>
<?php
    include('W:\domains\dessert\views\header\header.php');
    include('W:\domains\dessert\views\authorization\authorization.php');
    include('W:\domains\dessert\views\footer\footer.html');
?>
</html>

<?php
    require 'W:/domains/dessert/database/connect.php';
    session_start();
    if(isset($_POST['submit'])) {
        $username = filter_var(trim($_POST['username']));
        $password = filter_var(trim($_POST['password']));

        $password = md5($password."hashhh");

        $userQuery = $db->query("SELECT * FROM `user` WHERE `username` = '$username' and `password` = '$password'");
        $user = $userQuery->fetch_assoc();
        if(empty($user)) {
            $_SESSION['errors'] = "Логин или пароль введены неверно";
	        exit();
        }
        
        if($user['username'] == 'admin') {
            header('Location: http://dessert/views/admin/mainA.php');
            exit();
        }

        console_log($user);
        $_SESSION['user'] = $user;
        console_log($_SESSION['user']);
        $db->close();
        header('Location: http://dessert/index.php');

    } else {
        unset($_SESSION['errors']);
    }
?>