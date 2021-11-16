<?php
session_start();

$user = $_POST['txtAdmLogin'];
$senha = $_POST['txtAdmSenha'];


    if($user == 'Adm' && $senha == 'Adm123'){
        $_SESSION['login'] = true;
        $_SESSION['level'] = "adm";
        header("Location: ../AreaRestrita-adm/indexAreaRestrita.php");
    }
    else{
        $_SESSION['login'] = false;
        session_destroy();
        echo('<script> resultado = confirm("Usuário ou Senha inválido"); if(resultado == true){location.href="../Login-Adm.php";} else{
            location.href="../index.php"; } </script>');
    }

?>