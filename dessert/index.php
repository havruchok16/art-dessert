<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.svg" type="image/svg">
    <title>ART dessert</title>
</head>
<body>
    <?php
        session_start();
        function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }
        console_log($_SESSION['user']);
        
        include('W:\domains\dessert\views\header\header.php');
        include('W:\domains\dessert\views\main\main.html');
        include('W:\domains\dessert\views\footer\footer.html');
        console_log($_SESSION['user']);
    ?>
</body>
</html>