<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/personalizarPerfil.css">
    <title>Personalizar perfil</title>
</head>
<body>

<?php
session_start();
$idEmpresa = $_GET['id'];

require_once('../global_two.php');
$pdo = CONNECTION::GET_PDO();

$sql = "SELECT * FROM tbperfilempresa WHERE idEmpresa='$idEmpresa'";
$stm6 = $pdo->prepare($sql);
$stm6->execute();
while($row = $stm6->fetch(PDO::FETCH_BOTH)){
    $caminhoFoto = $row['fotoPerfilEmpresa'];
    $biografia = $row['biografiaPerfilEmpresa'];
};

if(isset($biografia)){
}
else{
    $biografia = "";
}

if(isset($caminhoFoto)){

}
else{
    echo("<style> .LadoDireito .fotoPerfil img{
        transform: rotate(0deg);
    }</style>");
    $caminhoFoto = "perfil.jpg";
}
?>

<form method="POST" action="cadastrar-perfilEmpresa.php?id=<?php echo $idEmpresa ?>" enctype="multipart/form-data">
<div class="container">
    <div class="LadoEsquerdo">
        <div class="conteudo">
            <div class="menuPasso">
                <a href="index.php"><i class="fas fa-arrow-left"></i></a>
                <p> Passo 2 de 2 </p>
             </div>
              <p class="titulo"> Diga mais sobre sua empresa </p>
              <p class="subtitulo"> Escreva uma breve apresentação sobre seu estabelecimento, ele será mostrado aos clientes em sua biografia
              <textarea name="txtBiografia" placeholder="Digite aqui" required> <?php echo $biografia ?> </textarea>
        </div>
    </div>
    
    <div class="LadoDireito">
    <div class="conteudo">

    
     <div class="proximo">
     <a href="perfilAreaRestrita.php?id=<?php echo $idEmpresa;?>">Finalizar</a>
     </div>

<?php $caminho ="../resources/images/upload/perfilEmpresa/".$caminhoFoto;?>
<div class="imagem">
     <div class="fotoPerfil"> <img style="transform: rotate(0deg);" src="<?php echo $caminho?>"></div>
     <div class="foto">
     <div class="inf">
         
         <label for="escolher"> Escolher foto </label>
         <input id="escolher" class="escolher" type="file" value="<?php echo $caminho; ?>" required name="arquivo" required>
         <button> Salvar</button>
</div>
</div> </div>



</div>

    </div>

</div>
</form>


<script src="https://kit.fontawesome.com/9c9b0fe6bb.js" crossorigin="anonymous"></script>
</body>
</html>