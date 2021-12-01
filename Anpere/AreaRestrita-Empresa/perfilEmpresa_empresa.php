<?php

session_start();
require_once('../global_two.php');

$id = $_GET['id'];
$idEmpresa = $_SESSION['idEmpresa'];

//PEGANDO EMPRESA PRO PERFIL
$empresa = new Empresa();
$data_empresa = $empresa->readEmpresas($id);

//PEGANDO CATEGORIA PRO PERFIL
$categoria = new Categoria();
$data_categoria = $categoria->listarCategoriaEsp($data_empresa['idCategoria']);

//PEGANDO O PERFIL
$perfilempresa = new PerfilEmpresa();
$data_perfil = $perfilempresa->readPerfil($id);

//PEGANDO AS PUBLICAÇÕES
$publicacao = new Publicacao();
$data_publicacao = $publicacao->readPublicacao($id);

//PEGANDO A(S) EMPRESA(S) RECOMENDADA(S)
$recomendacao = new Recomendacao();
$data_recomendacao = $recomendacao->allRec($id);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../resources/css/perfil.css" media="screen">
    <link href="../resources/images/LogoAnpere.png" rel="icon">

    <title></title>
</head>

<body>

    <div class="popup3" id="popup">
        <form method="POST" action="inserirSolicitacao.php?id=<?php echo $id;?>&idRemetente=<?php echo $idEmpresa;?>">
            <div class="tituloPopup">
                <h3>Envie uma solicitação de parceria!</h3>
                <p>Escreva o porque que essa empresa deveria recomenda-la para outros consumidores </p>
            </div>
            <textarea name="txtDescricao" placeholder="Digite aqui..."></textarea>
            <div class="buttons">
                <button type="submit" class="enviar">Enviar</button>
                <button class="cancelar" onclick="fechar1()">Cancelar</button>
            </div>
        </form>
    </div>

    <div class="container">
        <header>

            <div class="logo">
                <img src="../resources/images/LogoComNome.png" alt="Logo Anpere">
            </div>

            <div class="itens">
                <ul>
                    <li><a class="item-1" href="indexAreaRestrita.php">Buscar parcerias</a></li>
                    <li><a class="item-3" href="../Session/destruirSessao.php?pagina=index.php">Log out</a></li>
                </ul>
            </div>
        </header>
    </div>



    <div class="container-two">
        <div class="main-ctwo">

            <div class="texts">
                <div class="img">
                    <img <?php echo "src='../resources/images/upload/perfilEmpresa/" . $data_perfil['fotoPerfilEmpresa'] . "'"; ?> alt="Habbib's estabelecimento" class="img-perfil">
                </div>
                <div class="texts-one">
                    <a class="item-1" onclick="adicionar()">Solicitar parceria</a>
                    <h3><?php echo $data_empresa['nomeEmpresa'] ?></h3>
                    <p><?php echo $data_categoria['nomeCategoria'] ?></p>
                </div>
                <div class="texts-two">
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo $data_empresa['logradouroEmpresa'] . ", " . $data_empresa['numEndEmpresa'] . " - " . $data_empresa['bairroEmpresa'] . ", " . $data_empresa['estadoEmpresa'] ?></p>
                </div>

                <div class="div-about">
                    <button onclick="esconder_mostrar()">Sobre a empresa
                        <i class="fas fa-angle-down"></i></button>
                    <div id="text-about" class="text-about">
                        <p><?php echo $data_perfil['biografiaPerfilEmpresa'] ?></p>
                    </div>
                </div>

               
            </div>
            <div class="vitrines">

<!-- VITRINES -->

<!--VITRINE DESTINADA A EMPRESA -->
<div class="vitrine_um">

    <div class="titulo-e-butao">
        <h3>Produtos e Serviços</h3>
    </div>

    <?php if (empty($data_publicacao)) { ?>
        <div class="text_vitrine_um">
            <h3>Esta é a vitrine da empresa, ela divulgará seus serviços/produtos aqui.</h3>
            <p>Parece que ela ainda não publicou nada...</p>
        </div>
    <?php } else { ?>
        <div class="container_cards">
            <?php foreach ($data_publicacao as $data) { ?>



                <a href="">
                    <div class="card">
                        <div class="img">
                            <img src="../resources/images/upload/publicacao/<?php echo $data['fotoProdutoPublicacao']; ?>" alt="">
                        </div>
                        <div class="text">
                            <h3><?php echo $data['tituloPublicacao'] ?></h3>
                            <p class="preco">R$<?php echo $data['precoProdutoPublicacao'] ?></p>
                            <p class="desc"><?php echo $data['descricaoPublicacao'] ?></p>
                        </div>
                    </div>
                </a>



        <?php }
        } ?>

        </div>
</div>

<!--VITRINE DESTINADA A PARCERIAS -->
<div class="vitrine_dois">
    <h3 class="title">Parcerias</h3>
    <p class="subtitle">Visite empresas parceiras</p>
    <?php

    if (empty($data_recomendacao)) { ?>
        <div class="text_vitrine_dois">
            <h3>Esta área é destinada a divulgação de empresas parceiras.</h3>
            <p>Forme uma parceria! Isso será benéfico para ambas empresas!</p>
        </div>
    <?php } else { ?>

        <?php
        foreach ($data_recomendacao as $data) {
            $data_empresa = $empresa->readEmpresas($data['idEmpresaRecomendada']);
            $data_publicacao = $publicacao->readPublicacao2($data_empresa['idEmpresa']); ?>

            <div class="container_cards">
                <h3 class="title"><?php echo $data_empresa['nomeEmpresa'] ?></h3>
                <?php if (empty($data_publicacao)) {
                } else {
                    foreach ($data_publicacao as $data) { ?>

                        <a href="">
                            <div class="card">
                                <div class="img">
                                    <img src="../resources/images/upload/publicacao/<?php echo $data['fotoProdutoPublicacao']; ?>" alt="">
                                </div>
                                <div class="text">
                                    <h3><?php echo $data['tituloPublicacao'] ?></h3>
                                    <p class="desc"><?php echo $data['descricaoPublicacao'] ?></p>
                                </div>
                            </div>
                        </a>

                <?php }
                } ?>

            </div>
    <?php }
    } ?>
</div>
</div>

</div>
</div>

<script src="../resources/js/script.js">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
function previewImagem(){

var imagem = document.querySelector('[name=arquivo]').files[0];
var preview = document.querySelector('#img')

var reader = new FileReader()

reader.onloadend = function(){
preview.src = reader.result;
}

if(imagem) {
reader.readAsDataURL(imagem)
}else{
preview.src = "";
}

}
</script>
</body>

</html>