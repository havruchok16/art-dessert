<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://dessert/styles/general.css">
    <link rel="stylesheet" href="http://dessert/styles/header.css">
</head>
<header>
    <nav>
        <div>
            <a href="http://dessert/views/dessert/dessert.php"><img src="http://dessert/images/list.svg" alt="list"/></a>
        </div>

        <div>
            <a href="http://dessert/views/main/main.php"> <img src="http://dessert/images/logo.svg" alt="logo"/></a>
        </div>
        
        <div class="auth">
            <?php
                session_start();
                if(isset($_SESSION['user'])) {
                    echo "<a href='http://dessert/views/cart/cart.php'><img src='http://dessert/images/cart.svg' alt='cart'/></a>";
                }
            ?>
            <a href="http://dessert/views/authorization/auth.php"><img src="http://dessert/images/user.svg" alt="user"/></a>    
        </div>
    </nav>
</header>

