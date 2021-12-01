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
                <img style="width: 23%;" src="../resources/images/LogoComNome.png" alt="Logo Anpere">
            </div>

            <div class="itens">
                <ul>
                    <li><a class="item-1" href="busca_cliente.php?category=">Buscar empresas</a></li>
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
                </div>
                <div class="main-two-ctwo">

                    <?php foreach ($data_publicacao as $data) { ?>
                        <div class="card">
                            <div class="image">
                                <img <?php echo "src='../resources/images/upload/publicacao/" . $data['fotoProdutoPublicacao'] . "'"; ?> alt="">
                            </div>
                            <div class="texts">
                                <h3><?php echo $data['tituloPublicacao'] ?></h3>
                                <p class="preco">R$<?php echo $data['precoProdutoPublicacao'] ?></p>
                                <p class="descricao"><?php echo $data['descricaoPublicacao'] ?></p>
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