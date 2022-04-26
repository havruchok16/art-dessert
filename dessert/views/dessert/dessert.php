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
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://dessert/styles/general.css">
    <link rel="stylesheet" href="http://dessert/styles/desserts.css">
</head>

<main>
    <section class="dessert">
        <div>
            <p class="section-name">ДЕСЕРТЫ</p>
            <p>Кондитеры в компании ART dessert всегда готовят достойные десерты на любой вкус и выбор. 
                Большое количество начинок, украшения и немного фантазии могут вторить чудеса.
                <br><br>
                Все изделия сделаны полностью вручную, начиная от замеса простых продуктов: 
                яйца, муки и до шоколадного декора.
            </p>
        </div>
        <img class="section-image" src="http://dessert/images/main_section.png"/>
    </section>

    <section class="products">
        <form action="dessert.php" method="post">
            <select class="category" name="category">
                <option value="0">ВСЕ ДЕСЕРТЫ</option>
                <?php
                require 'W:/domains/dessert/helper/menu.php';

                    foreach($rows as $row) {
                        echo "<option value='". $row['id']. "'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select>

            <select class="price" name="price">
                <option value ="0">Выберите сортировку</option>
                <option value ="1"> По возрастанию цены </option>
                <option value ="2"> По убыванию цены </option>
            </select>

            <input type="hidden" name="form_id" value="1" />
            <input class="search-btn" type="submit" value="ПОДОБРАТЬ" name="ok"></input>
        </form>
        
        <form action="dessert.php" method="post">
            <input class="search" type="search" name="search_line" value="" placeholder="Поиск"></input>
            <input type="hidden" name="form_id" value="2" />
            <input class="search-btn" type="submit" value="НАЙТИ" name="search"></input>
        </form>

    </section>

    <section class="output-desserts">
        <?php
            session_start();

            $byn = " руб.";

            $formId = isset( $_POST['form_id'] ) ? $_POST['form_id'] : 0;
            if($formId != 2) {
                require 'W:/domains/dessert/helper/output-dessert.php';
                foreach($rows as $row) {
                    $src = "http://dessert/images/desserts".$row['image'];
                    echo "<form class='dessert-item'>";
                    echo "<img src=$src>";
                    echo "<input name='image' type='hidden' value='".$row['image']."'></input>";
                    echo "<p class='dessert-name'>".$row['name']."</p>";
                    echo "<input name='name' type='hidden' value='".$row['name']."'></input>";
                    echo "<p class='dessert-composition'>".$row['composition']."</p>";
                    echo "<input name='composition' type='hidden' value='".$row['composition']."'></input>";
                    echo "<p>".$row['price'].$byn."</p>";
                    echo "<input name='price' type='hidden' value='".$row['price']."'></input>";
                    if(isset($_SESSION['user'])) {
                        echo "<button class='dessert-btn' formaction='http://dessert/helper/add-to-basket.php' formmethod='post'>В КОРЗИНУ</button>";
                    }
                    echo "</form>";
                }
            } else if($formId == 2) {
                require 'W:/domains/dessert/helper/search.php';
                if(count($searchRows) != 0) {
                    foreach($searchRows as $row) {
                        $src = "http://dessert/images/desserts".$row['image'];
                        echo "<form class='dessert-item'>";
                        echo "<img src=$src>";
                        echo "<input name='image' type='hidden' value='".$row['image']."'></input>";
                        echo "<p class='dessert-name'>".$row['name']."</p>";
                        echo "<input name='name' type='hidden' value='".$row['name']."'></input>";
                        echo "<p class='dessert-composition'>".$row['composition']."</p>";
                        echo "<input name='composition' type='hidden' value='".$row['composition']."'></input>";
                        echo "<p>".$row['price'].$byn."</p>";
                        echo "<input name='price' type='hidden' value='".$row['price']."'></input>";
                        if(isset($_SESSION['user'])) {
                            echo "<button class='dessert-btn' formaction='http://dessert/helper/add-to-basket.php' formmethod='post'>В КОРЗИНУ</button>";
                        }
                        echo "</form>";
                    }
                } else {
                    echo "<p class='error'>ПО ВАШЕМУ ЗАПРОСУ НИЧЕГО НЕ НАЙДЕНО</p>";
                }
            }
        ?>
    </section>

    <section class="dessert">
        <div>
            <p class="section-name">ОТЗЫВЫ</p>
            <p>Мы ценим каждого своего клиента. Обратная связь для нас просто необходима, 
                поэтому будем благодарны, если вы оставите свой отзыв.
                <br><br>
                Обращаем ваше внимание, что оставлять отзывы могут только зарегистрированные пользователи.
            </p>
        </div>
        <img class="section-image" src="http://dessert/images/main_section2.png"/>
    </section>

    <section class="feedback">
        
        <?php
            require 'W:/domains/dessert/database/connect.php';
            require 'W:/domains/dessert/helper/output-comment.php';
            
            foreach($rowsComment as $row) {
                echo "<div class='feedback-item'>";
                echo "<div class='container'>";
                echo "<p class='username'>".$row['username']."</p>";
                echo "<p class='comm'>".$row['comment_text']."</p>";
                echo "<p class='date'>".$row['create_date']."</p>";
                echo "</div>";
                echo "</div>";
            }

            if(isset($_SESSION['user'])) {
                echo "<div class='cur-feedback'>
                        <form>
                            <p class='username'>".$_SESSION['user']['username']."</p>
                            <input class='comment' name='comment_text' type='text' placeholder='Ваш отзыв'></p>
                            <button class='comment-btn' formaction='http://dessert/helper/create-comment.php' formmethod='post'>Отправить</button>
                        </form> 
                    </div>";
            }
        ?>

        
    </section>

</main>    
<?php
    include('W:\domains\dessert\views\footer\footer.html');
?>
</html>