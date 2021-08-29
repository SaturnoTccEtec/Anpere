<?php
 

 $nome = $_POST['txtNome'];
 $cpf = $_POST['txtCpf'];
 $email = $_POST['txtEmail'];
 $senha = $_POST['txtSenha'];
 $tel1 = $_POST['txtTel1'];
 $tel2 = $_POST['txtTel2'];
 $log = $_POST['txtLog'];
 $num = $_POST['numero'];
 $cep = $_POST['txtCep'];
 $bairro = $_POST['txtBairro'];
 $cidade = $_POST['txtCidade'];
 $estado = $_POST['txtEstado'];
 $msgErro = "";

include("conexao.php");
$pdo = CONNECTION::GET_PDO();

 $stmt = $pdo->prepare("SELECT nomeCliente FROM tbcliente WHERE cpfCliente ='$cpf'");
 $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if(empty($result)){

    try{
        $stmt = $pdo->prepare("INSERT INTO tbcliente VALUES (null, '$nome', '$cpf', '$email', '$senha', '$log', '$estado', '$cidade', '$bairro', '$cep', '$num')");
        $stmt->execute();

    }catch(PDOException $err){
        print("Erro: ".$err);
    }

    header("Location: Login-Client.php");
}
else{
    echo ('<script> resultado = confirm("CPF já cadastrado"); if(resultado == true){location.href="Cadastro-Cliente.php";} else{
        location.href="index.html"; } </script>');
}

?>