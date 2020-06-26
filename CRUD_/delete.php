<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    session_start();
    require_once 'konekcija2.php';

    $id = $_GET['id'];
    if (isset($id)) {
        $stmt = $konekcija->prepare("SELECT * FROM tabelamasina WHERE id = :id ");

        $stmt->execute([
            'id' => $id
        ]);

        $masina = $stmt->fetch();
        if ($masina['status'] == "STOPPED") {
            $stmt = $konekcija->query("DELETE FROM tabelamasina WHERE id= $id");
            header("Location: pretraga.php");
        } else {
            $_SESSION['error'] = "UNABLE TO DELETE RUNNING MACHINE";
            header("Location: pretraga.php");
        }


//var_dump($task);
    }

//    header("Location: pretraga.php");
//    exit();
}






