<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        .container{
            text-align: center;


        }

    </style>
</head>
<body>

<div class="container">

<h3 STYLE="color: red">KREIRANJE MASINE</h3>

<form method="post" action="create.php">

    <label for="name">Name</label><br>
    <input id="name" name="name" type="text" >
    <?php if(isset( $_SESSION['nameErr'])): ?><br>
        <span style="color: red"> <?= $_SESSION['nameErr'] ?></span>
        <?php
        unset($_SESSION['nameErr']);
        ?>
    <?php endif; ?>

    <br><br>

    <label for="ram">Ram</label><br>
    <input id="ram" name="ram" type="number" >
    <?php if(isset( $_SESSION['ramErr'])): ?><br>
        <span style="color: red"> <?= $_SESSION['ramErr'] ?></span>
        <?php
        unset($_SESSION['ramErr']);
        ?>
    <?php endif; ?>

    <br><br>

    <label for="max">Max free</label><br>
    <input id="max" name="max" type="number" >
    <?php if(isset( $_SESSION['maxErr'])): ?><br>
        <span style="color: red"> <?= $_SESSION['maxErr'] ?></span>
        <?php
        unset($_SESSION['maxErr']);
        ?>
    <?php endif; ?>
    <br><br>
    <input type="submit">

    <a href="pretraga.php"><h3>PRETRAGA MASINA</h3></a>



</form>
</div>
</body>
</html>
