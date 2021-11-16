<?php

require_once("../global_two.php");
$id = $_GET["id"];
$idRemetente = $_GET['idRemetente'];

include("../classes/Connection.php");

$pdo = CONNECTION::GET_PDO();

$descricao = $_POST['txtDescricao'];

    //echo $descricaoPublicacao;

    try{

        $stmt = $pdo->prepare("insert into tbsolicitacaoparceria values (null,'$descricao', '$idRemetente','$id')");
        $stmt ->execute();
        $pdo = null;
        header("Location: perfilEmpresa_empresa.php?id=$id");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    

?>