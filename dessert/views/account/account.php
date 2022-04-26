<?php
    require 'W:/domains/dessert/database/connect.php';
    session_start();
    
    if(!empty($_SESSION['user'])) {
        $_SESSION['user'];
    }
?>
<?php
    include('W:\domains\dessert\views\header\header.php');
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://dessert/styles/account.css">
</head>
</head>

<main>
    <section class="account">
        <p class="section-name">ЛИЧНЫЙ КАБИНЕТ</p>
            <form class="account-info" action="change_fields.php" method="post">
                <div class="info">
                    <input class="input" name="username" readonly type="text" placeholder="имя пользователя" value="<?php echo $_SESSION['user']['username']?>" required/>
                    <input class="input" name="email" type="email" placeholder="электронная почта" value="<?php echo $_SESSION['user']['email']?>" required/>
                    <input class="input" name="phone" type="tel" placeholder="номер телефона" value="<?php echo $_SESSION['user']['phone']?>" required/>
                    <input class="input" name="address" type="text" placeholder="адрес" value="<?php echo $_SESSION['user']['address']?>"/>
                </div>

                <div class="buttons">
                    <input class="btn" type="submit" value="СОХРАНИТЬ" name="submit"></input>
                    <a class="btn" type="submit" href="http://dessert/views/authorization/logout.php" name="submit">ВЫЙТИ</a>
                </div>

                
            </form>
            
    </section>
</main>

<?php
    include('W:\domains\dessert\views\footer\footer.html');
?>