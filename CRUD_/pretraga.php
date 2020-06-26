<?php

session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style></style>
</head>
<body>
<div class="container">
<h2>SPISAK MASINA</h2>

<form>
    <input type="text" name="search" placeholder="Search">
    <input type="submit" value="Search">
</form>

<?php

$search = $_REQUEST['search'];


require_once 'konekcija2.php';


if (isset($search) && !empty($search) && is_numeric($search)) {
    $stmt = $konekcija->prepare ("SELECT * FROM tabelamasina WHERE ram = :search");
    $stmt->execute([
        'search' => $search
    ]);
}
else if (isset($search) && !empty($search) && !is_numeric($search)) {
    $stmt = $konekcija->prepare ("SELECT * FROM tabelamasina WHERE name LIKE :search");
    $stmt->execute([
        'search' => '%' . $search . '%'
     ]);
} else {
    $stmt = $konekcija->prepare("SELECT * FROM tabelamasina");
    $stmt->execute([]);
}


$row = $stmt->fetchAll();

?>

<ul>
<?php foreach ($row as $rows):?>
 <li>

    <?php echo $rows['name'];?>
     <?php echo $rows['ram'];?>
     <?php echo $rows['status'];?>
     <?php $id = $rows['id'];?>

     <form action="delete.php?id=<?= $id;?>" method="POST">
         <input type="submit" value="DELETE">
         <?php if(isset( $_SESSION['error'])): ?>
             <span style="color: red"> <?= $_SESSION['error'] ?></span>
             <?php
             unset($_SESSION['error']);
             ?>
         <?php endif; ?>
     </form>

     <form action="start.php?id=<?= $id; ?>" method="post">
         <input type="submit" value="START">
         <?php if(isset( $_SESSION['error'])): ?>
             <span style="color: red"> <?= $_SESSION['error'] ?></span>
             <?php
             unset($_SESSION['error']);
             ?>
         <?php endif; ?>
     </form>

     <form action="stop.php?id=<?= $id;  ?>" method="post">
         <input type="submit" value="STOP">
         <?php if(isset( $_SESSION['error'])): ?>
             <span style="color: red"> <?= $_SESSION['error'] ?></span>
             <?php
             unset($_SESSION['error']);
             ?>
         <?php endif; ?>
     </form>
 </li>

    <?php endforeach; ?>

</ul>
</div>
</body>
</html>