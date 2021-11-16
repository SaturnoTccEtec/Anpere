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

    require_once ('../global_two.php');
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


    <div class="container">
        <div class="LadoEsquerdo">
            <div class="conteudo">
                <div class="menuPasso">
                    <a href="abertura.html"><i class="fas fa-arrow-left"></i></a>
                    <p> Passo 1 de 2 </p>
                </div>
                <p class="titulo"> Qual o setor que sua empresa atua? </p>
                <div class="icones">
                    <div class="icone">
                        <button onclick="Icone1()">
                            <img src="../resources/images/bola-de-basquete.png">
                            <input id="icone1" name="icone1" type="hidden" value="13">
                            <p>Esportes & fitness</p>
                        </button>
                    </div>

                    <div class="icone">
                        <button onclick="Icone2()">
                            <img src="../resources/images/camiseta-branca-de-manga-curta.png">
                            <input id="icone2" name="icone2" type="hidden" value="9">
                            <p>Moda & acessórios</p>
                        </button>
                    </div>

                    <div class="icone">
                        <button onclick="Icone3()">
                            <img src="../resources/images/chave-inglesa.png">
                            <input id="icone3" name="icone3" type="hidden" value="2">
                            <p>Assistência técnica</p>
                        </button>
                    </div>

                    <div class="icone">
                        <button onclick="Icone4()">
                            <img src="../resources/images/fogao-eletrico.png">
                            <input id="icone4" name="icone4" type="hidden" value="11">
                            <p>Utensílios domésticos</p>
                        </button>
                    </div>

                </div>

                <div class="icones2">


                    <div class="icone" data-toggle="modal" data-target="MyModal" iddadiv="1">
                        <button onclick="Icone5()">
                            <img src="../resources/images/maquiagem.png">
                            <input id="icone5" name="icone5" type="hidden" value="7">
                            <p>Beleza & cuidados</p>
                        </button>
                    </div>

                    <div class="icone">
                        <button onclick="Icone6()">
                            <img src="../resources/images/smartphone.png">
                            <input id="icone6" name="icone6" type="hidden" value="15">
                            <p>Celulares & TI</p>
                        </button>
                    </div>


                    <div class="icone">
                        <button onclick="Icone7()">
                            <img src="../resources/images/sofa.png">
                            <input id="icone7" name="icone7" type="hidden" value="10">
                            <p>Móveis & decoração</p>
                        </button>
                    </div>

                    <div class="icone">
                        <button onclick="Icone8()">
                            <img src="../resources/images/urso-teddy.png">
                            <input id="icone8" name="icone8" type="hidden" value="6">
                            <p>Bebes & infantil</p>
                        </button>
                    </div>
                </div>
                <div class="icones3">
                    <div class="icone">

                        <button onclick="Icone9()">
                            <img src="../resources/images/outros.png">
                            <input id="icone9" name="icone9" type="hidden" value="Outro">
                            <p class="outro">Outro</p>
                        </button>
                    </div> <select id="cars" name="teste">
                        <option>Selecionar</option>
                        <option id="auto" value="1">Auto & Peças</option>
                        <option value="3">Alimentos</option>
                        <option value="4">Animais</option>
                        <option value="5">Arte, Papelaria e Armarinho</option>
                        <option value="8">Brinquedos</option>
                        <option value="12">Eletrônicos</option>
                        <option value="14">Festas</option>
                        <option value="16">Instrumentos & Musica</option>
                        <option value="17">Joalheirias & Bijuterias</option>
                        <option value="18">Saúde</option>
                        <option value="19">Bebidas</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="LadoDireito">
            <div class="conteudo">

                <?php $idEmpresa = $_GET["id"]; ?>

                <form method="POST" action="cadastrarCategoria.php?id=<?php echo $idEmpresa ?>">
                    <div class="proximo">
                        <i class="fas fa-arrow-right"></i>
                        <button onclick="Carregar()">Próximo</button>
                    </div>
                    <div class="fotoPerfil"><img src="../resources/images/upload/perfilEmpresa/perfil.jpg"></div>
                    <div class="inf">
                        <p> Nome da empresa: </p>
                        <br> <br>

                        <p> Categoria: </p>
                        <input id="selecionada" name="selecionada" type="text" readonly="readonly" value="indefinida">
                        <br>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        function Icone1() {
            var id = document.getElementById("icone1").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone2() {
            var id = document.getElementById("icone2").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone3() {
            var id = document.getElementById("icone3").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone4() {
            var id = document.getElementById("icone4").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone5() {
            var id = document.getElementById("icone5").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone6() {
            var id = document.getElementById("icone6").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone7() {
            var id = document.getElementById("icone7").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone8() {
            var id = document.getElementById("icone8").value;
            document.getElementById('selecionada').value = id;
        }

        function Icone9() {
            var id = document.getElementById("icone9").value;
            var input = document.getElementById('cars');
            input.style.display = 'unset';
            input.style.width = '240px';
            input.style.height = '30px';
        }

        function Carregar() {

            var select = document.getElementById('cars');
            var value = select.options[select.selectedIndex].value;
            if (value != "Selecionar") {
                document.getElementById('selecionada').value = value;
            }
        }
    </script>

    <script src="https://kit.fontawesome.com/9c9b0fe6bb.js" crossorigin="anonymous"></script>
</body>

</html>