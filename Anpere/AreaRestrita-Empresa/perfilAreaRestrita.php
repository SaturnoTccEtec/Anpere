<?php

session_start();
require_once('../global_two.php');

//$id = $_GET['id'];
$id = $_SESSION['idEmpresa'];

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

//PEGANDO AS SOLICITAÇÕES
$solicitacao = new SolicitacaoParceria();
$solicitacoes = $solicitacao->selectSolicitacao($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="chat/style.css">
    <link rel="stylesheet" href="../resources/css/perfil.css" media="screen">
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <title>Perfil</title>
</head>

<body>


    <div id="popup" class="popup">
        <div class="tituloPopup">
            <p> Publicar um serviço ou produto </p> <button onclick="fechar1()"> <i class="fas fa-times"></i> </button>
        </div>
        <div class="conteudoPopup">
            <div class="LadoEsquerdo">
                <form method="POST" enctype="multipart/form-data" action="inserir-publicacao.php?id=<?php echo $id ?>">
                    <p> Nome produto/serviço: </p>
                    <input name="txtTitulo" type="text" placeholder="Ex: Bolo de Morango" required>
                    <p> Descrição do produto: </p>
                    <textarea name="txtDescricao" placeholder="Digite aqui..." required> </textarea>
                    <p> Preço: </p>
                    <input name="txtPreco" class="preco" type="number" placeholder="R$">
                    
            </div>
            <div class="LadoDireito">
                <div class="parteCima">
                    <br>
                    <label for="escolher">Escolher foto <i class="far fa-images"></i> </label>
                     <input id="escolher" type="file" name="arquivo" onchange="previewImagem()" style="visibility: hidden" required>
                </div>
                <div class="parteBaixo">
                    <div class="imagem">
                            <img src="../resources/images/SemFoto.png" id="img">
                    </div>
                    <button type="submit"> Publicar </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="popup2" class="popup2">
        <div class="conteudoPopup2">
            <div class="tituloh">
                <p>Solicitações de parceria</p>
                <div><button onclick="fechar2()"><i class="fas fa-times"></i></button></div>
            </div>
            <div class="subtituloh">
                <p> Aceite ou recuse as solicitações de parceria pendentes</p>
            </div>
            <div class="table-popup2">
                <?php
                if ($solicitacoes == null) {
                    $soliIcon = "far fa-bell";
                    $soliColor = "#000";
                } else {
                    $soliIcon = "fa fa-exclamation-circle";
                    $soliColor = "#f00";
                    foreach ($solicitacoes as $dado) {
                        $remetente = $empresa->readEmpresas($dado['idRemetente']);
                        $solici_perfil = $perfilempresa->readPerfil($dado['idRemetente']);
                ?>
                        <div class="tr">

                            <div class="foto-nome">
                                <div class="img"><img <?php echo "src='../resources/images/upload/perfilEmpresa/" . $solici_perfil['fotoPerfilEmpresa'] . "'"; ?> class="img-perfil"></div>
                                <div class="nome"><?php echo $remetente['nomeEmpresa']; ?></div>
                            </div>

                            <div class="buttons-solicitacao">
                                <div class="btn btn-1"><a href="inserirRecomendacao.php?idRemetente=<?php echo $dado['idRemetente'] ?>"><button>Aceitar</button></a></div>
                                <div class="btn btn-2"><a href="excluirSolicitacao.php?idRemetente=<?php echo $dado['idRemetente'] ?>"><button>Recusar</button></a></div>
                            </div>

                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>


    <div class="container">
        <header>

            <div class="logo">
                <img src="../resources/images/LogoComNome.png" alt="Logo Anpere">
            </div>

            <div class="itens">
                <ul>
                    <li><a class="item-1" href="indexAreaRestrita.php">Buscar parcerias</a></li>
                    <li><a style="cursor: pointer;" onclick="abrir()" class="item-2">
                            <p><i <?php echo 'class="'. $soliIcon .'" style="color: '. $soliColor .';"' ?>></i> Notificações</p>
                        </a></li>
                    <li><a class="item-3" href="../Session/destruirSessao.php?pagina=index.php">
                            <p><i class="fas fa-power-off" _mstvisible="2"></i> Log out</p>
                        </a></li>
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
                        <button onclick="adicionar()">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>

                    <?php if (empty($data_publicacao)) { ?>
                        <div class="text_vitrine_um">
                            <h3>Esta é a sua vitrine, divulgue seus serviços/produtos aqui.</h3>
                            <p>Clique no ícone acima para adicionar uma nova publicação.</p>
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
                    <h3 class="title"><?php echo $data_empresa['nomeEmpresa']?> recomenda:</h3>
                    <p class="subtitle">Visite empresas parceiras</p>
                    <?php

                    if (empty($data_recomendacao)) { ?>
                        <div class="text_vitrine_dois">
                            <h3>Esta área é destinada a divulgação de empresas parceiras.</h3>
                            <p>Forme uma parceria! Isso será benéfico para ambas empresas.</p>
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