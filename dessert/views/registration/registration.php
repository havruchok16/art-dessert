<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/forms.css">
</head>

<main>
    <section class="registration">
            <form action="reg.php" method="post">
                <p class="section-name">РЕГИСТРАЦИЯ</p>

                <sub><?php echo $_SESSION['error_user']?></sub>
                <input name="username" type="text" placeholder="имя пользователя" required/>
                <input name="phone" type="tel" placeholder="телефон" required/>
                <input name="email" type="email" placeholder="email" required/>
                <input name="password" type="password" placeholder="пароль" required/>

                <input class="btn" type="submit" value="Зарегистроваться" name="submit"></input>

                <p class="quest">Уже зарегистрированы?</p>
                <a class="auth" href="http://dessert/views/authorization/auth.php">ВОЙТИ</a>
            </form>
    </section>
</main>