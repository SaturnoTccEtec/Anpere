<?php

require_once('global.php');

$pdo = Connection::GET_PDO();

//Um simples select de nome 

    $stmt = $pdo -> prepare("select nomeCliente from tbCliente where cpfCliente = '72193848076'");
    $stmt -> execute();
    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $nomeCliente = $row['nomeCliente'];
    };
    echo 'Nome do cliente :'. $nomeCliente;
//

echo'<br>';


//Selecionando a quantidade de colunas de uma tabela

    $sql = "SELECT * FROM tbcliente";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $numRows = $stm->rowCount();
    echo'Quantidade de clientes cadastrados na plataforma: '. $numRows;

//

echo '<br>';

//Selecionando a quantidade de colunas com uma where
    
    $sql2 = "SELECT nomeCliente FROM tbcliente WHERE bairroCliente='Cidade Popular'";
    $stm2 = $pdo->prepare($sql2);
    $stm2->execute();
    $numRows2 = $stm2->rowCount();
    echo'Quantidade de clientes cadastrados na plataforma que moram no bairro Cidade Popular: '. $numRows2;

//


 ?>