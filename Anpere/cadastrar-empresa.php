<?php

 $nome = $_POST['txtNome'];
 $cnpj = $_POST['txtCnpj'];
$email =  $_POST['txtEmail'];
 $senha =  $_POST['txtSenha'];
 $tel1 =  $_POST['txtTel1'];
 $tel2 =  $_POST['txtTel2'];
 $log =  $_POST['txtLog'];
 $num =  $_POST['numero'];
 $cep =  $_POST['txtCep'];
 $bairro =  $_POST['txtBairro'];
 $cidade =  $_POST['txtCidade'];
 $estado =  $_POST['txtEstado'];
 $msgErro = "";

 include_once("conexao.php");
 $pdo = CONNECTION::GET_PDO();
 
 
  $stmt = $pdo->prepare("SELECT nomeEmpresa FROM tbempresa WHERE cnpjEmpresa ='$cnpj'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if(empty($result)){
 
     try{
      $stmt = $pdo->prepare("INSERT INTO tbempresa VALUES (null,'$nome', '$email', '$senha', '$cnpj','$log', '$estado', '$cidade','$bairro', '$cep', '$num')");
         $stmt->execute();
 
     }catch(PDOException $err){
         print("Erro: ".$err);
     }
 
     header("Location: Login-Empresa.php");
 }
 else{
     echo ('<script> resultado = confirm("CNPJ já cadastrado"); if(resultado == true){location.href="Cadastro-Empresa.php";} else{
         location.href="index.html"; } </script>');
 }







 ?>