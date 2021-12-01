<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/personalizarPerfil2.css">
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <title>Perfil - Personalizar</title>
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
        <form method="POST" action="cadastrar-perfilEmpresa.php?id=<?php echo $idEmpresa?>" enctype="multipart/form-data">
            <div class="container">


                <div class="LadoEsquerdo">
                    <div class="indice">
                        <p>Passo 2 de 2</p>
                    </div>

                    <div class="textos">
                        <p class="titulo">Diga mais sobre sua empresa!</p>
                        <p class="subtitulo">Escreva uma breve apresentação sobre seu estabelecimento, ele será mostrado para clientes e outras empresas que visitarem seu perfil.</p>
                        <textarea name="txtBiografia" placeholder="Fale sobre sua empresa..." required> <?php echo $biografia ?> </textarea>
                    </div>
                </div>


                <div class="LadoDireito">
                    <div class="next">
                        <a href="perfilAreaRestrita.php?id=<?php echo $idEmpresa;?>"> <label for="enviar">Finalizar</label> </a>
                    </div>

                    <div class="imagem">
                        <div class="fotoPerfil">
                            <img src="../resources/images/perfil.png" id="img">
                        </div>
                        <div class="foto">
                            <div class="inf" style="display: flex; flex-direction: column; align-items: center">
                                <label for="escolher">Escolher foto <i class="far fa-images"></i> </label>
                                <input id="escolher" type="file" name="arquivo" onchange="previewImagem()" style="visibility: hidden" required>
                                <input id="enviar" type="submit" style="visibility: hidden">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>

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


    <script src="https://kit.fontawesome.com/9c9b0fe6bb.js" crossorigin="anonymous"></script>
</body>

</html>