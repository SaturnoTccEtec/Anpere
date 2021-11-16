<?php

session_start();


require_once("../global_two.php");

$idRemetente = $_GET['id'];
$idEmpresa = $_SESSION['idEmpresa'];
$hoje = date('d/m/Y');

include("../classes/Connection.php");

$pdo = CONNECTION::GET_PDO();


    //echo $descricaoPublicacao;

    try{

        $stmt = $pdo -> prepare("select * from tbempresaparceria where idEmpresa = '$idEmpresa'");
        $stmt -> execute();
    
        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $idEmpresaParceria = $row['idEmpresaParceria'];
        };

        $stmt = $pdo->prepare("insert into tbparceria values (null,'$idRemetente','$idEmpresaParceria','$hoje')");
        $stmt ->execute();
        $pdo = null;
        header("Location: perfilAreaRestrita.php");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    

?>