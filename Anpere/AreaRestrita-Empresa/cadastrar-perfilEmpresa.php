<?php

    $biografia = $_POST['txtBiografia'];
    $idEmpresa = $_GET["id"];

$msg = false;

require_once('../global_two.php');
$pdo = CONNECTION::GET_PDO();

$sql = "SELECT * FROM tbperfilempresa WHERE idEmpresa='$idEmpresa'";
$stm6 = $pdo->prepare($sql);
$stm6->execute();
while($row = $stm6->fetch(PDO::FETCH_BOTH)){
    $caminhoFoto = $row['fotoPerfilEmpresa'];
    $biografia2 = $row['biografiaPerfilEmpresa'];
};

if(isset($caminhoFoto)){

    if(isset($_FILES['arquivo'])){
        $extensao = strtolower( substr($_FILES['']['name'], -4));
        $novo_nome = md5(time()). $extensao;
        $diretorio = "../resources/images/upload/perfilEmpresa/";
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $stmt = $pdo->prepare("UPDATE tbperfilempresa SET idEmpresa = '$idEmpresa', fotoPerfilEmpresa = '$novo_nome', biografiaPerfilEmpresa = '$biografia'");
    $stmt ->execute();
    header("Location: perfilAreaRestrita.php");
    }

}

else{

if(isset($_FILES['arquivo'])){
    $extensao = strtolower( substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()). $extensao;
    $diretorio = "../resources/images/upload/perfilEmpresa/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $stmt = $pdo->prepare("INSERT INTO tbperfilempresa VALUES (NULL, '$idEmpresa', '$novo_nome', '$biografia')");
    $stmt ->execute();
    header("Location:  perfilAreaRestrita.php");

}}

?>