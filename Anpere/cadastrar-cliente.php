<?php
require_once('global.php');

$cliente = new Cliente();

$cliente->setNomecliente($_POST['txtNome']);
$cliente->setCpfcliente($_POST['txtCpf']);
$cliente->setEmailcliente($_POST['txtEmail']);
$cliente->setSenhacliente($_POST['txtSenha']);
$cliente->setTelefonecliente($_POST['txtTel']);
$cliente->setLogradouro($_POST['txtLog']);
$cliente->setNum($_POST['numero']);
$cliente->setCep($_POST['txtCep']);
$cliente->setBairro($_POST['txtBairro']);
$cliente->setCidade($_POST['txtCidade']);
$cliente->setEstado($_POST['txtEstado']);


/*ANTES DE FAZER O INSERT, VAMOS VERIFICAR O EMAIL E O CPF*/

$value_email = $cliente->verificarEmail($cliente);
$value_cpf = $cliente->verificarCpf($cliente);

/*SE O EMAIL RETORNAR UM FALSE, SIGNIFCIA QUE NÃO FOI ENCONTRADO ESSE EMAIL/CPF NO BANCO
SE FOR TRUE ELE RETORNA UM ALERT*/

if (empty($value_cpf)) {
    if (empty($value_email)) {
        try {
            $cliente->cadastrar($cliente);

            header("Location: Login-Client.php");
        } catch (PDOException $err) {
            print("Erro: " . $err);
        }
    } else {
        echo ('<script> resultado = confirm("Email já cadastrado"); if(resultado){location.href="Cadastro-Cliente.php";} else{
            location.href="index.php"; } </script>');
    }
} else {
    echo ('<script> resultado = confirm("CPF já cadastrado"); if(resultado){location.href="Cadastro-Cliente.php";} else{
        location.href="index.php"; } </script>');
}
