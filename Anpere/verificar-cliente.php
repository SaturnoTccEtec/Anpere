<?php

session_start();

include_once("conexao.php");

$cpf = $_POST['txtClienteLogin'];
$senha = $_POST['txtClienteSenha'];

$cpfBanco = '';
$senhaBanco = '';
$pdo = CONNECTION::GET_PDO();

    try {
        $stmt = $pdo -> prepare("select cpfCliente, senhaCliente from tbCliente where cpfCliente='$cpf' and senhaCliente='$senha'");

        $stmt -> execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $cpfBanco = $row['cpfCliente'];
            $senhaBanco =  $row['senhaCliente'];
        };

    } catch (PDOException $e) {
        print "Erro: " . $e->getMessage();
    }

    if($cpf == $cpfBanco && $senha == $senhaBanco){
        $_SESSION['autorizacao'] = true;
        header("Location: bemvindo.php");
    }
    else{
        $_SESSION['autorizacao'] = false;
        unset($_SESSION['autorizacao']);
        session_destroy();
        echo('<script> resultado = confirm("CPF ou Senha inválido"); if(resultado == true){location.href="Login-Client.php";} else{
            location.href="index.html"; } </script>');
    }

?>