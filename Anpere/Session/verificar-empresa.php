<?php

session_start();

require_once("../global_two.php");

$cnpj = $_POST['txtEmpresaLogin'];
$senha = $_POST['txtEmpresaSenha'];

$cnpjBanco = '';
$senhaBanco = '';
$pdo = Connection::GET_PDO();


    try {
        $stmt = $pdo -> prepare("select cnpjEmpresa, senhaEmpresa, idEmpresa from tbempresa where cnpjEmpresa='$cnpj' and senhaEmpresa='$senha'");

        $stmt -> execute();

        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
            $cnpjBanco = $row['cnpjEmpresa'];
            $senhaBanco =  $row['senhaEmpresa'];
            //obter o id da empresa que fez login e salva-lo em session para realizar operações
            $login =  $row['idEmpresa'];
        };

    } catch (PDOException $e) {
        print "Erro: " . $e->getMessage();
    }

    //VERIFICANDO O LOGIN
    if($cnpj == $cnpjBanco && $senha == $senhaBanco){
        //SE OK, LOGIN TRUE 
        $_SESSION['login'] = true;
        $_SESSION['level'] = "empresa";
        
        if($login!=null and $login!=""){
            $idLogin = (int)$login;
            $_SESSION['idEmpresa'] = $idLogin;
            }
        header("Location: ../AreaRestrita-Empresa/indexAreaRestrita.php");
    }
    else{
        $_SESSION['login'] = false;
        session_destroy();
        echo('<script> resultado = confirm("CNPJ ou Senha inválido"); if(resultado == true){location.href="../Login-Empresa.php";} else{
            location.href="../index.php"; } </script>');
    }

?>