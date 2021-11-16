<?php
//$CNPJ = $_GET["cnpj"];

$idEmp = $_GET['id'];

require_once('../global_two.php');
$pdo = CONNECTION::GET_PDO();

$stmt = $pdo -> prepare("select * from tbempresa where idEmpresa = '$idEmp'");
$stmt -> execute();

while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $id= $row['idEmpresa'];
    $CNPJ = $row['cnpjEmpresa'];
    $nome = $row['nomeEmpresa'];
    $email = $row['emailEmpresa'];
    $logradouro = $row['logradouroEmpresa'];
    $senha = $row['senhaEmpresa'];
    $estado = $row['estadoEmpresa'];
    $cidade = $row['cidadeEmpresa'];
    $bairro = $row['bairroEmpresa'];
    $cep = $row['cepEmpresa'];
    $numEndCliente = $row['numEndEmpresa'];
};

    $tituloPublicacao = $_POST['txtTitulo'];
    $descricaoPublicacao = $_POST['txtDescricao'];
    $fotoProdutoPublicacao = $_FILES['txtFoto'];
    $foto = $_POST['txtFoto'];
    $precoProdutoPublicacao = $_POST['txtPreco'];

    //echo $descricaoPublicacao;

    try{


        if (isset($fotoProdutoPublicacao)) {
            if ($fotoProdutoPublicacao['size'] > 2097152) {  // Verificação de tamanho de arquivo
                die("Arquivo muito grande. (Max: 2MB)");
            }
            if ($fotoProdutoPublicacao['error']) {
                die("Falha ao enviar o arquivo");
            }

            $extencao = strtolower(pathinfo($fotoProdutoPublicacao['name'], PATHINFO_EXTENSION));  // Pegar a extenção do arquivo
            $novoNome = uniqid() . '.' . $extencao;

            if ($extencao != "jpg" && $extencao != "png") {  // Verificação de tipo de arquivo
                die("Tipo de arquivo inválido (png e jpg)");
            }

            $diretorio = "../resources/images/upload/publicacao/";

                move_uploaded_file($fotoProdutoPublicacao['tmp_name'], $diretorio.$novoNome);
                $stmt = $pdo->prepare("insert into tbpublicacao values (null,'$tituloPublicacao', '$novoNome','$precoProdutoPublicacao', '$descricaoPublicacao',null,'$id','3')");
        $stmt ->execute();
        } 
        $pdo = null;
        header("Location: perfilAreaRestrita.php?id=$idEmp");
    }
    catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
    

?>