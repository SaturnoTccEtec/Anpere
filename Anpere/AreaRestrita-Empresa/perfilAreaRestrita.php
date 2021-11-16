<?php

session_start();
require_once('../global_two.php');

$id = $_GET['id'];

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

    <title></title>
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
                    <input name="txtPreco" class="preco" type="number">
            </div>
            <div class="LadoDireito">
                <div class="parteCima">
                    <br>
                    <i class="far fa-images"></i>
                    <label for="txtFoto"> Carregar Imagem </label>
                    <a href="#"> Salvar <a>
                            <input name="txtFoto" id="txtFoto" type="file" required>
                </div>
                <div class="parteBaixo">
                    <div class="Imagem">

                        <i class="fas fa-question"></i>
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
                <div>
                    <p>Solicitações de parceria</p>
                </div>
                <div><button onclick="fechar2()"><i class="fas fa-times"></i></button></div>
            </div>
            <div class="subtituloh">
                <p> Aceite ou recuse as solicitações de parceria pendentes</p>
            </div>

        </div>
    </div>


    <div class="container">
        <header>

            <div class="logo">
                <img src="../resources/images/LogoAnpere.png" alt="Logo Anpere">
            </div>

            <div class="itens">
                <ul>
                    <li><a class="item-1" href="indexAreaRestrita.php">Buscar parcerias</a></li>
                    <li><a onclick="abrir()" class="item-2" href="#">
                            <p><i class="far fa-bell"></i> Notificações</p>
                        </a></li>
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

                <div class="recomend">
                    <h4>Você recomenda:</h4>
                    <button onclick="adicionar2()">
                        <p>Ver vitrine recomendados <i class="far fa-star"></i></p>
                    </button>
                    <div class="empresas_recomendadas">
                        <?php if ($data_recomendacao == null) {
                        } else {
                            foreach ($data_recomendacao as $data) {
                                $data_perfil_recomendacao = $perfilempresa->readPerfil($data['idEmpresaRecomendada']);
                                $info_empresa = $recomendacao->recEsp($data['idEmpresaRecomendada']);

                                $data_publicacao2 = $publicacao->readPublicacao($data['idEmpresaRecomendada']);
                        ?>

                                <div class="card">
                                    <div class="img-2">
                                        <img <?php echo "src='../resources/images/upload/perfilEmpresa/" . $data_perfil_recomendacao['fotoPerfilEmpresa'] . "'"; ?>>
                                    </div>
                                    <h4><?php echo $info_empresa['nomeEmpresa']; ?></h4>
                                </div>

                        <?php }
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div id="vitrine" class="right">
                <div class="titulo-e-butao">
                    <h3>Produtos e Serviços</h3>
                    <button onclick="adicionar()">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
                <div class="main-two-ctwo">

                    <?php foreach ($data_publicacao as $data) { ?>
                        <div class="card">
                            <div class="image">
                                <img <?php echo "src='../resources/images/upload/publicacao/" . $data['fotoProdutoPublicacao'] . "'"; ?> alt="">
                            </div>
                            <div class="texts">
                                <h3><?php echo $data['tituloPublicacao'] ?></h3>
                                <p><?php echo $data['precoProdutoPublicacao'] ?></p>
                                <p><?php echo $data['descricaoPublicacao'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- VITRINE EXCLUSIVA -->

            <div id="vitrineexclusiva" class="right">
                <div class="titulo-e-butao">
                    <h3>Vitrine Exclusiva</h3>
                </div>

                <div class="main-two-ctwo">
                    <?php
                    if ($data_recomendacao == null) {
                    } else {
                        foreach ($data_publicacao2 as $data) { ?>
                            <div class="card">
                                <div class="image">
                                    <img <?php echo "src='../resources/images/upload/publicacao/" . $data['fotoProdutoPublicacao'] . "'"; ?> alt="">
                                </div>
                                <div class="texts">
                                    <h3><?php echo $data['tituloPublicacao'] ?></h3>
                                    <p><?php echo $data['precoProdutoPublicacao'] ?></p>
                                    <p><?php echo $data['descricaoPublicacao'] ?></p>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../resources/js/script.js">
    </script>
</body>

</html>