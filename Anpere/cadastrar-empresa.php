<?php
session_start();
require_once('global.php');

$empresa = new Empresa();

$empresa->setNomeempresa($_POST['txtNome']);
$empresa->setCnpjempresa($_POST['txtCnpj']);
$empresa->setEmailempresa($_POST['txtEmail']);
$empresa->setSenhaempresa($_POST['txtSenha']);
$empresa->setTelefoneempresa($_POST['txtTel']);
$empresa->setLogradouro($_POST['txtLog']);
$empresa->setNum($_POST['numero']);
$empresa->setCep($_POST['txtCep']);
$empresa->setBairro($_POST['txtBairro']);
$empresa->setCidade($_POST['txtCidade']);
$empresa->setEstado($_POST['txtEstado']);

/* CATEGORIA PADRÃO */
$empresa->setIdcategoria(1);


/*ANTES DE FAZER O INSERT, VAMOS VERIFICAR O EMAIL E O CNPJ*/

$value_email = $empresa->verificarEmail($empresa);
$value_cnpj = $empresa->verificarCnpj($empresa);

/*SE O EMAIL RETORNAR VAZIO, SIGNIFCIA QUE NÃO FOI ENCONTRADO ESSE EMAIL/CNPJ NO BANCO
SE FOR != DE VAZIO ELE RETORNA UM ALERT*/


if (empty($value_cnpj)) {
    if (empty($value_email)) {
        try {
            $empresa->cadastrar($empresa);

            $queryEmpresa = $empresa->readEmpresas($empresa);
            $id = $queryEmpresa['idEmpresa'];
            if(isset($id)){

                $_SESSION['login'] = true;
                $_SESSION['level'] = "empresa";
                $_SESSION['idEmpresa'] = $id;
                header("Location: AreaRestrita-Empresa/personalizarPerfil.php?id=$id");
            }
            
        } catch (PDOException $err) {
            print("Erro: " . $err);
        }
    } else {
        echo ('<script> resultado = confirm("Email já cadastrado"); if(resultado){location.href="Cadastro-Empresa.php";} else{
            location.href="index.php"; } </script>');
    }
} else {
    echo ('<script> resultado = confirm("CNPJ já cadastrado"); if(resultado){location.href="Cadastro-Empresa.php";} else{
        location.href="index.php"; } </script>');
}
?>