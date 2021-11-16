<?php

 $nome = $_POST['txtNome'];
 $cnpj = $_POST['txtCnpj'];
$email =  $_POST['txtEmail'];
 $senha =  $_POST['txtSenha'];
 $tel =  $_POST['txtTel'];
 $log =  $_POST['txtLog'];
 $num =  $_POST['numero'];
 $cep =  $_POST['txtCep'];
 $bairro =  $_POST['txtBairro'];
 $cidade =  $_POST['txtCidade'];
 $estado =  $_POST['txtEstado'];
 $msgErro = "";

 require_once('../global_two.php');
 $pdo = Connection::GET_PDO();
 
 
  $stmt = $pdo->prepare("SELECT nomeEmpresa FROM tbempresa WHERE cnpjEmpresa ='$cnpj'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt2 = $pdo->prepare("SELECT nomeEmpresa FROM tbempresa WHERE emailEmpresa ='$email'");
  $stmt2->execute();
  $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
  
  if(empty($result)){

    if(empty($result2)){

 
     try{
      $stmt = $pdo->prepare("INSERT INTO tbempresa VALUES (null,'$nome', '$email', '$senha', '$cnpj','$log', '$estado', '$cidade','$bairro', '$cep', '$num')");
      $stmt->execute();

      //Cadastro do telefone

      $stmt = $pdo->prepare("SELECT idEmpresa FROM tbempresa WHERE cnpjEmpresa = '$cnpj'");
      $stmt->execute();
      $empresa = $stmt->fetch(PDO::FETCH_ASSOC);
      $idEmpresa = (int)$empresa['idEmpresa'];

      #echo("".$idEmpresa);

      $stmt = $pdo->prepare("INSERT INTO tbtelefoneempresa VALUES (null, '$idEmpresa', '$tel')");
      $stmt->execute();
 
     }catch(PDOException $err){
         print("Erro: ".$err);
     }
 
     header("Location: AvaliarEmpresa.php");
    }

    else{
        echo ('<script> resultado = confirm("Email já cadastrado"); if(resultado == true){location.href="Cadastro-Empresa.php";} else{
            location.href="AvaliarEmpresa.php"; } </script>');
    }
 }
 else{
     echo ('<script> resultado = confirm("CNPJ já cadastrado"); if(resultado == true){location.href="Cadastro-Empresa.php";} else{
         location.href="AvaliarEmpresa.php"; } </script>');
 }







 ?>