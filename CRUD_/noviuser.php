<?php

session_start();


$username = $_REQUEST['username'];
$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];

$error = '';

if (empty($username)) {
    $_SESSION['emailErr'] = "Email is required";
    $error = true;
//    header("Location: registracija.php");


} else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailErr'] = "Invalid email format";
    $error = true;
//    header("Location: registracija.php");

}

if (empty($_REQUEST['password'])){
    $_SESSION['sifraerr'] = "Password is required";
    $error = true;
//    header("Location: registracija.php");
//    exit();
}

if ($error){
    header("Location: registracija.php");
    exit();
}

require_once 'konekcija.php';

$stmt = $konekcija->prepare("INSERT INTO opettabela (username,password,firstname,lastname)
                    VALUES (:username, :password, :firstname, :lastname)"
);

$stmt->execute([

    'username'=> $username,
    'password' => $password,
    'firstname' => $firstname,
    'lastname' => $lastname

]);

header("Location: pocetna.php");
