<?php

session_start();

include_once("conexao.php");

$cnpj = $_POST['txtEmpresaLogin'];
$senha = $_POST['txtEmpresaSenha'];

$cnpjBanco = '';
$senhaBanco = '';
$pdo = CONNECTION::GET_PDO();


    try {
        $stmt = $pdo -> prepare("select cnpjEmpresa, senhaEmpresa from tbempresa where cnpjEmpresa='$cnpj' and senhaEmpresa='$senha'");

        $stmt -> execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $cnpjBanco = $row['cnpjEmpresa'];
            $senhaBanco =  $row['senhaEmpresa'];
        };

    } catch (PDOException $e) {
        print "Erro: " . $e->getMessage();
    }

    if($cnpj == $cnpjBanco && $senha == $senhaBanco){
        $_SESSION['autorizacao'] = true;
        header("Location: bemvindo.php");
    }
    else{
        $_SESSION['autorizacao'] = false;
        unset($_SESSION['autorizacao']);
        session_destroy();
        echo('<script> resultado = confirm("CNPJ ou Senha inválido"); if(resultado == true){location.href="Login-Empresa.php";} else{
            location.href="index.html"; } </script>');
    }

?>