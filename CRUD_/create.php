<?php

session_start();


$name = $_REQUEST['name'];
$ram = $_REQUEST['ram'];
$max = $_REQUEST['max'];

$uuid = uniqid();
$status = "STOPPED";
$active = '0';
$createAt = date("Y-m-d");

$error = '';

if(empty($name))
{
    $_SESSION['nameErr'] = "Must not be empty";
    $error = true;
//    header("Location: dashboard.php");
//    exit();
}
else if (strlen($name) < 3)
{
    $_SESSION['nameErr'] = "Ne sme biti kraci do 3 slova";
    $error = true;
//    header("Location: dashboard.php");
//    exit();

}

if($ram < 0)
{
    $_SESSION['ramErr'] = "Mora biti pozitivan broj ";
    $error = true;

}
else if ($ram > 64)
{
    $_SESSION['ramErr'] = "Broj mora biti manji od 64";
    $error = true;

}

if ($max < 0)
{
    $_SESSION['maxErr'] = "Mora biti pozitivan broj";
    $error = true;

}

if ($error){
    header("Location: dashboard.php");
    exit();
}

require_once 'konekcija2.php';

$stmt = $konekcija->prepare("INSERT INTO tabelamasina (uuid, name,status,createAt,active,ram,max_free)
                    VALUES (:uuid, :name, :status, :createAt, :active, :ram, :max_free)"
);

$stmt->execute([

    'uuid'=> $uuid,
    'name' => $name,
    'status' => $status,
    'createAt' => $createAt,
    'active' => $active,
    'ram' => $ram,
    'max_free' => $max

]);

header("Location: dashboard.php");


