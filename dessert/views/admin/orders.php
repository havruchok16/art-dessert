<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://dessert/styles/admin.css">
</head>
<?php
    include('W:\domains\dessert\views\header\headerA.php');
?>
<main>
    <p>номер -- -- корзина -- -- заказ -- -- дата -- -- адрес -- -- стоимость -- -- пожелания</p>
    <?php
        require 'W:/domains/dessert/helper/output-orders.php';
        foreach($rowsOrders as $row) {
            echo "<form class='orders'>";
            echo "<input class='number' readonly name='id' value='". $row['id']. "'>";
            echo "<input class='number' name='basket_id' value='". $row['basket_id']. "'>";
            echo "<input class='number' name='order_id' value='". $row['order_id']. "'>";
            echo "<input name='date' value='". $row['date']. "'>";
            echo "<input name='address' value='". $row['address']. "'>";
            echo "<input class='number' name='cost' value='". $row['cost']. "'>";
            echo "<input name='dream' value='". $row['dream']. "'>";
            echo "<br>";
            echo "</form>";
        }
    ?>
    
</main>