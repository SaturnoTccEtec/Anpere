<?php

session_start();


require_once("../global_two.php");

$idRemetente = $_GET['idRemetente'];
$idEmpresa = $_SESSION['idEmpresa'];

include("../classes/Connection.php");

$pdo = CONNECTION::GET_PDO();


    //echo $descricaoPublicacao;

    try{

        $stmt = $pdo->prepare("insert into tbrecomendacao values (null,'$idEmpresa','$idRemetente')");
        $stmt ->execute();

        $stmt2 = $pdo->prepare("delete from tbsolicitacaoparceria WHERE idRemetente='$idRemetente'");
        $stmt2 ->execute();
        $pdo = null;

        header("Location: inserirEmpresaParceria.php?id=$idRemetente");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    

?>