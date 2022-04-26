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
<!--     <link rel="stylesheet" href="http://dessert/styles/forms.css"> -->
    <link rel="stylesheet" href="http://dessert/styles/basket.css">
</head>

<main>
    <p class="section-namee">КОРЗИНА</p>
    <section class="basket">
        <?php
            session_start();

            require 'W:/domains/dessert/helper/output-basket.php';

            $count = "1";
            $more = "+";
            $less = "-";
            $delete = "×";
            $byn = " руб.";

            foreach($rowsBasket as $row) {
                $src = "http://dessert/images/desserts".$row['image'];
                echo "<form>";
                echo "<div class='basket-item'>";
                echo "<img src=$src>";
                echo "<p class='dessert-name'>".$row['dessert_name']."</p>";
/*              echo "<button class='basket-btn'>".$more."</button>";
                echo "<p>".$count."</p>";
                echo "<button class='basket-btn'>".$less."</button>"; */
                echo "<p class='basket-price'>".$row['dessert_price'].$byn."</p>";
                echo "<input type='hidden' name='basket_id' value='". $row['basket_id']. "'>";
                echo "<button class='delete-btn' formaction='http://dessert/helper/delete-from-basket.php' formmethod='post'>".$delete."</button>";
                echo "</div>";
                echo "</form>";
            }

            if(empty($rowsBasket)){
                echo "<div class='error'> <br><br>ВАША КОРЗИНА ПУСТА <br><br> НЕОБХОДИМО ДОБАВИТЬ ДЕСЕРТЫ <br><br><br><br> </div>";
                echo "<a class='other-btn' href='http://dessert/views/dessert/dessert.php'>ДЕСЕРТЫ</a>";
            } else{
                echo "<form action='http://dessert/views/cart/order.php' method='post'>
                            <button class='other-btn' href='http://dessert/views/dessert/dessert.php'>ДАЛЕЕ</button>
                        </form>";
            }
        ?>
    </section>

</main>    
<?php
    include('W:\domains\dessert\views\footer\footer.html');
?>
</html>