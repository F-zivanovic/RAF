<?php
session_start();

require_once 'konekcija.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$stmt = $konekcija->prepare("SELECT  username, password FROM opettabela WHERE username = :username");
//$stmt->bindParam(":username", $username, PDO::PARAM_STR);

$stmt->execute([
    'username'=>$username
]);
$row = $stmt->fetch();

if ($row && password_verify($password, $row['password']))
    header("Location: dashboard.php");
else {
    header("Location: pocetna.php");
}

if (!$row['username']) {
    $_SESSION['credentials'] = "Bad credentials. Please login again ";

}
    else if (!password_verify($password, $row['password'])) {
        $_SESSION['credentials'] = "Bad credentials. Please login again";
    }




















