<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://dessert/styles/admin.css">
</head>
<?php
    include('W:\domains\dessert\views\header\headerA.php');
?>
<main>
    <?php
        require 'W:/domains/dessert/helper/admin-func.php';
        foreach($rows as $row) {
            echo "<form>";
            echo "<input class='number' readonly name='id' value='". $row['id']. "' required>";
            echo "<input name='name' value='". $row['name']. "' required>";
            echo "<input class='number' name='category_id' value='". $row['category_id']. "' required>";
            echo "<input class='number' name='price' value='". $row['price']. "' required>";
            echo "<input class='composition' name='composition' value='". $row['composition']. "' required>";
            echo "<button class='btn' formaction='http://dessert/helper/update-item.php' formmethod='post'>Изменить</button>";
            echo "<button class='btn' formaction='http://dessert/helper/delete-item.php' formmethod='post'>Удалить</button>";
            echo "<br>";
            echo "</form>";
        }
        require 'W:/domains/dessert/helper/menu.php';

        echo "<p>Категории</p>";

        foreach($rows as $row) {
            echo "<p>".$row['name']. " - ". $row['id'] . "</p>";
        }
    ?>

    <p><br><br>Добавление категории</p>

    <form class="output">
        
        <input name='name' value='' placeholder="НАЗВАНИЕ" required>
        <button class='btn' formaction='http://dessert/helper/add-category.php' formmethod='post'>Добавить</button>
    </form>

    <p><br><br>Добавление товара</p>

    <form class="outputt">
        
        <input name='name' value='' placeholder="НАЗВАНИЕ" required>
        <select class="category" name="category">
            <option value="0">КАТЕГОРИЯ</option>
            <?php
            require 'W:/domains/dessert/helper/menu.php';
            
            foreach($rows as $row) {
                echo "<option value='". $row['id']. "'>";
                echo $row['name'];
                echo "</option>";
            }
            ?>
        </select>
        <input class='number' name='price' value='' placeholder="ЦЕНА" required>
        <input class='composition' name='composition' value='' placeholder="СОСТАВ" required>
        <button class='btn' formaction='http://dessert/helper/add-item.php' formmethod='post'>Добавить</button>
    </form>
    
</main>