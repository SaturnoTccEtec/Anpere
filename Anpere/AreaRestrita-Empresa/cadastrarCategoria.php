<?php

require_once('../global_two.php');

try {
    $upCat = new Empresa();

    $upCat->setIdcategoria($_POST['selecionada']);
    $upCat->setIdempresa($_GET['id']);

    $upCat->updateCategoria($upCat);

    $id = $_GET['id'];
    header("Location: personalizarPerfil2.php?id=$id");

} catch (PDOException $err) {
    print("Erro: " . $err);
}



?>