<?php

session_start();


require_once("../global_two.php");

$idRemetente = $_GET['id'];
$idEmpresa = $_SESSION['idEmpresa'];

include("../classes/Connection.php");

$pdo = CONNECTION::GET_PDO();


    //echo $descricaoPublicacao;

    try{

        $stmt = $pdo->prepare("insert into tbempresaparceria values (null,'$idEmpresa')");
        $stmt ->execute();
        $pdo = null;
        echo $idRemetente;
        header("Location: inserirParceria.php?id=$idRemetente");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    

?>