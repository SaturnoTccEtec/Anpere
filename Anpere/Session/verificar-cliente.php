<?php

session_start();

require_once("../global_two.php");

$cpf = $_POST['txtClienteLogin'];
$senha = $_POST['txtClienteSenha'];

$cpfBanco = '';
$senhaBanco = '';
$pdo = CONNECTION::GET_PDO();

    try {
        $stmt = $pdo -> prepare("select cpfCliente, senhaCliente, idCliente from tbCliente where cpfCliente='$cpf' and senhaCliente='$senha'");

        $stmt -> execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $cpfBanco = $row['cpfCliente'];
            $senhaBanco =  $row['senhaCliente'];
             //obter o id do cliente que fez login e salva-lo em session para realizar operações
            $login = $row['idCliente'];
        };

    } catch (PDOException $e) {
        print "Erro: " . $e->getMessage();
    }

    if($cpf == $cpfBanco && $senha == $senhaBanco){

        //se o login tiver êxito, criar as váriaveis de session de seu respectivo acesso
        $_SESSION['login'] = true;
        $_SESSION['level'] = "cliente";

        //cria a session do id do usuário
        if($login!=null and $login!=""){
        $idLogin = (int)$login;
        $_SESSION['idCliente'] = $idLogin;
        $_SESSION['cpf_unique'] = $cpfBanco;
        }
        header("Location: ../AreaRestrita-Cliente/indexAreaRestrita.php");
    }
    else{
        $_SESSION['login'] = false;
        session_destroy();
        echo('<script> resultado = confirm("CPF ou Senha inválido"); if(resultado == true){location.href="../Login-Client.php";} else{
            location.href="../index.php"; } </script>');
    }

?>