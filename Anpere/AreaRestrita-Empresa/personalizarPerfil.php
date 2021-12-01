<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/personalizarPerfil.css">
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <title>Perfil - Personalizar</title>
</head>

<body>

    <?php

    require_once('../global_two.php');
    $idEmpresa = $_GET["id"];

    $pdo = Connection::GET_PDO();

    $sql = "SELECT * FROM tbperfilempresa WHERE idEmpresa='$idEmpresa'";
    $stm6 = $pdo->prepare($sql);
    $stm6->execute();
    while ($row = $stm6->fetch(PDO::FETCH_BOTH)) {
        $caminhoFoto = $row['fotoPerfilEmpresa'];
        $biografia = $row['biografiaPerfilEmpresa'];
    };

    if (isset($biografia)) {
    } else {
        $biografia = "";
    }

    if (isset($caminhoFoto)) {
    } else {
        echo ("<style> .LadoDireito .fotoPerfil img{
        transform: rotate(0deg);
    }</style>");
        $caminhoFoto = "perfil.jpg";
    }

    ?>


    <?php




    ?>

    <div class="container">

        <div class="LadoEsquerdo">

            <div class="conteudo">
                <div class="menuPasso">
                    <p>Passo 1 de 2</p>
                </div>
                <div class="titulo">
                    <p>Em qual setor sua empresa atua? </p>
                </div>


                <div class="icones">

                    <form method="POST" action="cadastrarCategoria.php?id=<?php echo $idEmpresa ?>">

                        <label class="label" for="icone_1">
                            <img src="../resources/images/bola-de-basquete.png" alt="categoria-esporte-fitness">
                            <p>Esportes & fitness</p>
                            <input type="submit" value="13" id="icone_1" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_2">
                            <img src="../resources/images/camiseta-branca-de-manga-curta.png" alt="categoria-moda-acessorios">
                            <p>Moda & acessórios</p>
                            <input type="submit" value="9" id="icone_2" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_3">
                            <img src="../resources/images/chave-inglesa.png" alt="categoria-assistencia-tecnica">
                            <p>Assistência técnica</p>
                            <input type="submit" value="2" id="icone_3" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_4">
                            <img src="../resources/images/fogao-eletrico.png" alt="categoria-eletrodomesticos">
                            <p>Utensílios domésticos</p>
                            <input type="submit" value="11" id="icone_4" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_5">
                            <img src="../resources/images/maquiagem.png" alt="categoria-beelza-cuidadopessoal">
                            <p>Beleza & cuidados</p>
                            <input type="submit" value="7" id="icone_5" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_6">
                            <img src="../resources/images/smartphone.png" alt="categoria-celular-ti">
                            <p>Celulares & TI</p>
                            <input type="submit" value="15" id="icone_6" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_7">
                            <img src="../resources/images/sofa.png" alt="moveis-decoracao">
                            <p>Móveis & decoração</p>
                            <input type="submit" value="10" id="icone_7" name="icone" style="display: none;">
                        </label>

                        <label class="label" for="icone_8">
                            <img src="../resources/images/urso-teddy.png" alt="bebes-infantil">
                            <p>Bebes & infantil</p>
                            <input type="submit" name="icone" value="6" id="icone_8" style="display: none;">
                        </label>

                        <label onclick="abrirselect()" class="label">
                            <img src="../resources/images/outros.png" alt="">
                            <p>Outros</p>
                            <input type="btn" value="6" id="icone_9" style="display: none;">
                        </label>

                        <label class="other-category">
                            <div class="dropdown-select">
                                <label class="select">Selecione a categoria</label>
                                <i class="fa fa-caret-down icon"></i>
                            </div>
                            <div class="dropdown-list">

                                <div class="dropdown-list_item">
                                    <label for="icone_10">Auto & Peças</label>
                                    <input type="submit" name="icone" value="1" id="icone_10" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_11">Alimentos</label>
                                    <input type="submit" name="icone" value="3" id="icone_11" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_12">Animais</label>
                                    <input type="submit" name="icone" value="4" id="icone_12" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_13">Arte, Papelaria & Armarinho</label>
                                    <input type="submit" name="icone" value="5" id="icone_13" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_14">Brinquedos</label>
                                    <input type="submit" name="icone" value="8" id="icone_14" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_15">Eletrônicos</label>
                                    <input type="submit" name="icone" value="12" id="icone_15" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_16">Festas</label>
                                    <input type="submit" name="icone" value="14" id="icone_16" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_17">Instrumentos & Música</label>
                                    <input type="submit" name="icone" value="16" id="icone_17" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_18">Joalherias & Bijuterias</label>
                                    <input type="submit" name="icone" value="17" id="icone_18" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_19">Saúde</label>
                                    <input type="submit" name="icone" value="18" id="icone_19" style="display: none;">
                                </div>

                                <div class="dropdown-list_item">
                                    <label for="icone_20">Bebidas</label>
                                    <input type="submit" name="icone" value="19" id="icone_20" style="display: none;">
                                </div>

                            </div>

                        </label>

                    </form>

                </div>

            </div>

        </div>

        <div class="LadoDireito">
            <div class="conteudo">
                <?php

                $empresa = new Empresa();
                $data_empresa = $empresa->readEmpresas($idEmpresa);

                $categoria = new Categoria();


                if ($data_empresa['idCategoria'] === 20) {
                    $categoria = "Nenhuma categoria selecionada";
                } else {
                    $data_cat = $categoria->listarCategoriaEsp($data_empresa['idCategoria']);
                    $categoria = $data_cat['nomeCategoria'];
                }

                ?>

                <div class="fotoPerfil"><img src="../resources/images/perfil.png"></div>

                <div class="inf">
                    <p class="p empresa"><?php echo $data_empresa['nomeEmpresa'] ?></p>

                    <div class="inf dois">
                        <p class="p cat"><i class="fas fa-tags"></i> Setor: <?php echo $categoria; ?> </p>
                    </div>
                </div>

                <div class="btn-salvar-foto">
                    <a href="personalizarPerfil2.php?id=<?php echo $idEmpresa ?>"><button id="btn-salvar">Salvar e seguir</button></a>
                </div>

            </div>

        </div>

    </div>

    <script src="../resources/js/script.js"></script>
    <script src="../resources/js/select.js"></script>

    <script>
        function Icone9() {
            var id = document.getElementById("icone9").value;
            var input = document.getElementById('cars');
            input.style.display = 'unset';
            input.style.width = '240px';
            input.style.height = '30px';
        }
    </script>

    <script src="https://kit.fontawesome.com/9c9b0fe6bb.js" crossorigin="anonymous"></script>
</body>

</html>