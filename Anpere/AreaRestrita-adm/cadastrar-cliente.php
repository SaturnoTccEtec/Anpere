<?php
 

 $nome = $_POST['txtNome'];
 $cpf = $_POST['txtCpf'];
 $email = $_POST['txtEmail'];
 $senha = $_POST['txtSenha'];
 $tel = $_POST['txtTel'];
 $log = $_POST['txtLog'];
 $num = $_POST['numero'];
 $cep = $_POST['txtCep'];
 $bairro = $_POST['txtBairro'];
 $cidade = $_POST['txtCidade'];
 $estado = $_POST['txtEstado'];
 $msgErro = "";

 require_once('../global_two.php');
$pdo = Connection::GET_PDO();

 $stmt = $pdo->prepare("SELECT nomeCliente FROM tbcliente WHERE cpfCliente ='$cpf'");
 $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 $stmt2 = $pdo->prepare("SELECT nomeCliente FROM tbcliente WHERE emailCliente = '$email'");
 $stmt2->execute();
 $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

 
 if(empty($result)){

    if(empty($result2)){

    try{
        $stmt = $pdo->prepare("INSERT INTO tbcliente VALUES (null, '$nome', '$cpf', '$email', '$senha', '$log', '$estado', '$cidade', '$bairro', '$cep', '$num')");
        $stmt->execute();

        //Cadastro do telefone

        $stmt = $pdo->prepare("SELECT idCliente FROM tbcliente WHERE cpfCliente = '$cpf'");
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        $idCliente = (int)$cliente['idCliente'];
        //echo("".$idCliente);

        $stmt = $pdo->prepare("INSERT INTO tbtelefonecliente VALUES (null, '$idCliente', '$tel')");
        $stmt->execute();

    }catch(PDOException $err){
        print("Erro: ".$err);
    }


    header("Location: AvaliarCliente.php");
}

else{
    echo ('<script> resultado = confirm("Email já cadastrado"); if(resultado){location.href="Cadastro-Cliente.php";} else{
        location.href="AvaliarCliente.php"; } </script>');
}
}
else{
    echo ('<script> resultado = confirm("CPF já cadastrado"); if(resultado){location.href="Cadastro-Cliente.php";} else{
        location.href="AvaliarCliente.php"; } </script>');
}
