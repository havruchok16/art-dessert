<?php
    require 'W:/domains/dessert/database/connect.php';
    session_start();
    
    if(!empty($_SESSION['user'])) {
        $_SESSION['user'];
    }
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http:///dessert/styles/forms.css">
</head>

<?php
    include('W:\domains\dessert\views\header\header.php');
?>

<main>
    <section class="order">
            <form>
                <p class="section-name">ЗАКАЗ</p>
                
                <input name="address" type="text" placeholder="адрес доставки" value="<?php echo $_SESSION['user']['address']?>" required/>
                <input name="date" type="datetime-local" placeholder="дата доставки" required/>
                <input name="dream" type="text" placeholder="пожелания к заказу"/>

                <p>После оформления заказа, вам позвонят.</p>

                <button class="btn" formaction='http://dessert/helper/create-order.php' formmethod='post'>Оформить</button>
            </form>
    </section>
</main>

<?php
    include('W:\domains\dessert\views\footer\footer.html');
?>