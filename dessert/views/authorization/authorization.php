<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/forms.css">
</head>

<main>
    <section class="authorization">
            <form action="auth.php" method="post">
                <p class="section-name">АВТОРИЗАЦИЯ</p>
                
                <sub><?php echo $_SESSION['errors']?></sub>
                <input name="username" type="username" placeholder="имя пользователя" required/>
                <input name="password" type="password" placeholder="пароль" required/>

                <input class="btn" type="submit" value="ВОЙТИ" name="submit"></input>

                <p class="quest">Еще не зарегистрированы?</p>
                <a class="auth" href="http://dessert/views/registration/reg.php">РЕГИСТРАЦИЯ</a>
            </form>
    </section>
</main>