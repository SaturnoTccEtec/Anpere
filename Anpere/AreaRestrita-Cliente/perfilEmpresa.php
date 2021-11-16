<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/perfil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9c9b0fe6bb.js" crossorigin="anonymous"></script>
    <title>Perfil</title>
</head>
<body>

<?php

$id = $_GET["id"];


require_once("../global_two.php");
$pdo = Connection::GET_PDO();
    $stmt = $pdo -> prepare("select * from tbempresa where idEmpresa = '$id'");
    $stmt -> execute();

    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
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
        $idCategoria = $row['idCategoria'];
    };


    $stmt = $pdo -> prepare("select * from tbperfilempresa where idEmpresa = '$id'");
    $stmt -> execute();

    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
        $fotoPerfil = $row['fotoPerfilEmpresa'];
        $biografia = $row['biografiaPerfilEmpresa'];
    };

    $stmt = $pdo -> prepare("select * from tbcategoria where idCategoria = '$idCategoria'");
    $stmt -> execute();

    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
      $nomeCategoria = $row['nomeCategoria'];
    };


?>

    <div class="conteudo">
        <div class="LadoEsquerdo">
        <!-- Column -->
        <div class="card"> <div class="banner"></div>
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="../resources/images/upload/perfilEmpresa/<?php echo $fotoPerfil; ?>" alt="user"></div>
                <h3 class="m-b-0"><?php echo $nome ?></h3>
                <p><?php echo $nomeCategoria; ?></p> 
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">X</h3><small>Numero postagens</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">X</h3><small>Numero avaliações</small>
                    </div>
            </div>
        </div>
    </div></div>
    
</div>

    <div class="LadoDireito">
    <div class="conteudo2">
    <div class="biografia">
    <h5>Biografia:</h5>
    <p ontouchstart="true"> <?php echo $biografia ?></p>

</div> <div class="endereco"><h5>Endereço:</h5>
    <p ontouchstart="true"><?php echo $logradouro; echo", "; echo $cidade; echo", "; echo $bairro?></p>
</div></div>

<div class="conteudo-pub">

<div class="barraInformativa">
  <div class="parte1"> <i class="fas fa-tags"></i> <p class="empresa"><?php echo $nome?></p>
<p class="setor"><?php echo $nomeCategoria; ?></p></div>
  <div class="parte2"> <p class="pesquisar">Pesquisar serviço</p> <div class="barraPesquisa"><input type="text"> <i class="fas fa-search"></i></div></div>
  <div class="parte3"><i class="fas fa-caret-square-down"></i> <p class="parceria">Veja nossos serviços</p>
<p class="parceria2">e analise a qualidade</p></div>
</div>


<div class="titulo">
<p class="tituloPrincipal"> Produtos e serviços </p> <a href="#"><p class="subtitulo"> Ver todas </p></a></div>

<div class="cards">


<?php 

$stmt = $pdo -> prepare("select * from tbpublicacao where idEmpresa = '$id'");
$stmt -> execute();

while($row = $stmt->fetch(PDO::FETCH_BOTH)){

 echo("
 <div class='recipe-card'>
<aside>
  <img src='../resources/images/upload/publicacao/"); echo $row['fotoProdutoPublicacao']; echo("' alt='Chai Oatmeal' />
</aside>
<article>
  <h2>"); echo $row['tituloPublicacao']; echo("</h2>
  <h5>"); echo $nome; echo("</h5>
  <p>"); echo $row['descricaoPublicacao']; echo("</p>
  <a href='#' class='button'>"); echo("R$ ".$row['precoProdutoPublicacao']); echo("</a>
  <div class='estrelas'>
  <div class='rating rating2'><!--
		--><a href='#5' title='Give 5 stars'>★</a><!--
		--><a href='#4' title='Give 4 stars'>★</a><!--
		--><a href='#3' title='Give 3 stars'>★</a><!--
		--><a href='#2' title='Give 2 stars'>★</a><!--
		--><a href='#1' title='Give 1 star'>★</a>
	</div>
</div>
</article>
</div>
 ");
};

?>




</div>

</div>


</div>



<div class="tituloRecomenda">
<p class="tituloPrincipal"> A empresa recomenda:</p></div>

<?php

$stmt = $pdo -> prepare("select * from tbrecomendacao where idEmpresa = '$id'");
$stmt -> execute();

while($row4 = $stmt->fetch(PDO::FETCH_BOTH)){
$idEmpresaRecomendada = $row4['idEmpresaRecomendada'];

$stmt4 = $pdo -> prepare("select * from tbempresa where idEmpresa = '$idEmpresaRecomendada'");
$stmt4 -> execute();

while($row5 = $stmt4->fetch(PDO::FETCH_BOTH)){

  $stmt5 = $pdo -> prepare("select * from tbperfilempresa where idEmpresa = '$idEmpresaRecomendada'");
$stmt5 -> execute();

while($row6 = $stmt5->fetch(PDO::FETCH_BOTH)){

  $nomeEmpresaRecomendada = $row5['nomeEmpresa'];
  $fotoPerfilRecomendada = $row6['fotoPerfilEmpresa'];

  echo("<a href='perfilEmpresa.php?id="); echo $idEmpresaRecomendada; echo("<div class='cardsRecomenda'>
  <div class='cardRecomenda'><div class='img'> <img src='../resources/images/upload/perfilEmpresa/"); echo $fotoPerfilRecomendada; echo("'></div> 
   <div>
     <p class='nomeh'>"); echo $nomeEmpresaRecomendada; echo("</p>
     <p class='setorr'> Setor da empresa </p>
   </div></div>");

}
}
}


?>




<br>
<br>
<br>
<br>

<script>
  function adicionar(){

    popup.style.visibility="visible";
    var x=window.scrollX;
    var y=window.scrollY;
    window.onscroll=function(){window.scrollTo(x, y);
}

  } 
  
  function Fechar(){

    popup.style.visibility="hidden";
    window.onscroll=function(){};

  }</script>




<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>
</html>