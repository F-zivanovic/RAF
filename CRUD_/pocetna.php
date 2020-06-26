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

        #username{
            text-align: center;
            width: 320px;

        }

        #password{
            text-align: center;
            width: 320px;

        }

        #submit{
            text-align: center;
            width: 300px;

        }

        h3{
           color: red;
        }

        .container{
            text-align: center;
        }

    </style>
</head>
<body>

<?php require_once 'konekcija.php'; ?>

<div class="container">
<h3>SIGN IN</h3>
<form method="POST" action="proveralogin.php" >

    <label for="username"></label>
    <input id="username" name="username" type="email" placeholder="USERNAME" required>

    <br><br>

    <label for="password"></label>
    <input id="password" name="password" type="password" placeholder="PASSWORD" required ><br><br>

    <input type="submit" id="submit" ><br>
    <span><a href="registracija.php">Do not have account. Register now</a></span>

    <?php if(isset( $_SESSION['credentials'])): ?>
        <span style="color: red"> <?= $_SESSION['credentials'] ?></span>
        <?php
        unset($_SESSION['credentials']);
        ?>
    <?php endif; ?>

</form>
</div>

</body>
</html>








