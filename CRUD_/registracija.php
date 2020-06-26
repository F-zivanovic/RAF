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
        h3{
            color: red;
        }

    .container{
        text-align: center;
    }

    </style>

</head>
<body>

<div class="container">
<h3>REGISTRATION</h3>

<form method="POST" action="noviuser.php">

    <label for="username">Username(Email address)</label><br>
    <input id="username" name="username" type="email" required>
    <?php if(isset( $_SESSION['emailErr'])): ?><br>
        <span style="color: red"> <?= $_SESSION['emailErr'] ?></span>
        <?php
        unset($_SESSION['emailErr']);
        ?>
    <?php endif; ?>

    <br>
    <label for="password">Password</label><br>
    <input id="password" name="password" type="password" required >
    <?php if(isset( $_SESSION['sifraerr'])): ?><br>
        <span style="color: red"> <?= $_SESSION['sifraerr'] ?></span>
        <?php
        unset($_SESSION['sifraerr']);
        ?>
    <?php endif; ?>
    <br>

    <label for="firstname">First name</label><br>
    <input id="firstname" name="firstname" type="text"><br><br>

    <label for="lastname">Last name</label><br>
    <input id="lastname" name="lastname" type="text"><br><br>

    <input type="submit">

</form>

</div>


</body>
</html>
