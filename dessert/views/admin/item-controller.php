<?php
    include('W:\domains\dessert\views\header\headerA.php');
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/account.css">
</head>

<main>
    <section class="account">
            <form action="http://dessert/helper/add-item.php" method="post">

                <div class="info">
                    <input name="name" type="text" value="" placeholder="name"/>
                    <input name="category_id" type="text" value="" placeholder="category_id"/>
                    <input name="price" type="text" value="" placeholder="price"/>
                    <input name="composition" type="text" value="" placeholder="composition"/>
                </div>

                <input class="btn" type="submit" value="добавить" name="submit"></input>
            </form>
    </section>

</main>