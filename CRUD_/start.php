<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    require_once 'konekcija2.php';

    $id = $_REQUEST['id'];

    $stmt = $konekcija->prepare ("SELECT * FROM tabelamasina WHERE id = :id ");
    $stmt->execute([

        'id' => $id
    ]);
    $masina = $stmt->fetch();

    if ($masina['status'] == 'STOPPED') {
        sleep(2);
        $stmt = $konekcija->query("UPDATE `tabelamasina` SET `status` = 'RUNNING' WHERE `tabelamasina`.`id` = $id");
        header("Location: pretraga.php");
    } else {
        $_SESSION['error'] = "UNABLE TO START RUNNING MACHINE";
        header("Location: pretraga.php");
    }
}