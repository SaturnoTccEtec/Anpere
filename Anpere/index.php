<?php


require_once('global.php');

$listar = new Categoria();
$lista = $listar->listarCategoria();

//LISTANDO EMPRESAS

$empresa = new Empresa();
$listaEmpresas = $empresa->listarEmpresasIndex();

$empresa2 = new Empresa();
$listaEmpresas2 = $empresa->listarEmpresasIndex2();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="resources/css/index.css" media="screen">

  <link href="resources/images/LogoAnpere.png" rel="icon">
  <title>Anpere</title>
</head>

<body>
  <div class="container">

    <header>

      <div class="logo">
        <a href="index.php"><img src="resources/images/LogoAnpere.png" alt="Logo Anpere"></a>
      </div>

      <div class="itens">
        <ul>
          <li><a href="Cadastro-Cliente.php">Crie sua conta</a></li>
          <li><a href="Login-Client.php">Login</a></li>
          <li><a class="empresa" href="index_empresa.php">Divulgar</a></li>
        </ul>
      </div>
    </header>
  </div>

  <div class="container-two">
    <form method="GET" action="busca_cliente.php">
      <div class="main">

        <div class="dropdown">

          <select name="category" id="category">
            <option selected disabled>Selecionar categoria</option>
            <?php //Percorrendo o array
            foreach ($lista as $linha) { ?>
              <option value="<?php echo $linha['idCategoria'] ?>">
                <?php echo $linha['nomeCategoria'] ?></option>
            <?php }; ?>
          </select>
        </div>

        <div class="search-box">
          <div class="searchbar">
            <i class="fas fa-search"></i>
            <input name="keyword" id="keyword" type="text" placeholder="Use palavras-chave...">
          </div>

          <div class="location">
            <div class="searchbar">
              <i class="fas fa-map-marker-alt" _mstvisible="2"></i>
              <input name="endereco" id="endereco" type="text" placeholder="Bairro...">
            </div>

          </div>

          <div class="button">
            <button type="submit">Find</button>
          </div>
        </div>

      </div>
    </form>
  </div>



  <div class="container-tree">
    <div class="titulo">
      <h3>Para casa</h3>
    </div>

    <div class="main-two">


      <?php
      foreach ($listaEmpresas as $empresas) {
          $perfilempresa = new PerfilEmpresa();
          $imagemPerfil = $perfilempresa->listarImagensIndex($empresas['idEmpresa']);

      ?>
        <div class="card">
            <div class="image">
              <img <?php echo "src='resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?> alt="Habbib's estabelecimento">
            </div>
            <div class="texts">
              <h3><?php echo $empresas['nomeEmpresa']; ?></h3>
              <p><?php echo ("Rua " . $empresas['logradouroEmpresa'] . " - " . $empresas['bairroEmpresa'] . ", " . $empresas['estadoEmpresa']); ?></p>
            </div>
            <div class="button">
            <a href="perfilEmpresa.php?id=<?php echo $empresas['idEmpresa'];?>"><button>Mais</button></a>
            </div>
          </div>
      <?php
      }
      ?>


    </div>
  </div>



  <div class="container-tree">
    <div class="titulo">
      <h3>Moda & Beleza</h3>
    </div>

    <div class="main-two">

    <?php
        foreach ($listaEmpresas2 as $empresas2) {
          $perfilempresa = new PerfilEmpresa();
          $imagemPerfil = $perfilempresa->listarImagensIndex($empresas2['idEmpresa']);


        ?>
          <div class="card">
            <div class="image">
              <img <?php echo "src='resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?> alt="Habbib's estabelecimento">
            </div>
            <div class="texts">
              <h3><?php echo $empresas2['nomeEmpresa']; ?></h3>
              <p><?php echo ("Rua " . $empresas2['logradouroEmpresa'] . " - " . $empresas2['bairroEmpresa'] . ", " . $empresas2['estadoEmpresa']); ?></p>
            </div>
            <div class="button">
              <a href="perfilEmpresa.php?id=<?php echo $empresas2['idEmpresa']; ?>"><button>Mais</button></a>
            </div>
          </div>
        <?php
        }
        ?>



    </div>
  </div>

  <div class="container-four">
    <div class="main-tree">

      <div class="texto">
        <h3>Imperatriz do comércio local</h3>
        <p>Como funciona?</p>
      </div>

      <div class="box-cards">
        <div class="left">
          <div class="item">

            <div class="item1-1">
              <h3>BUSCA</h3>
              <p>A Anpere permite realizar buscas por empresas da região.</p>
              <p class="p">Cadastre-se e descubra próximas a você!</p>
              <div class="button">
                <a href="Cadastro-Cliente.php"><button>Cadastrar</button></a>
              </div>
            </div>


            <div class="item1-2">
              <img src="resources/images/busque.png" alt="">
            </div>

          </div>
          <div class="item">
            <div class="item1-1">
              <h3>DIVULGUE E FORME PARCERIAS</h3>
              <p class="p2">Divulgue seus melhores serviços na plataforma.</p>
              <p class="p2-2">Forme parcerias com outras empresas e cresçam juntas no mercado!</p>
              <div class="button">
                <a href="index_empresa.php"><button>Divulgar</button></a>
              </div>
            </div>


            <div class="item1-2">
              <img src="resources/images/ui-ux-design-banner.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-five">
    <footer>
      <div class="footer-part1">
        <div class="menu">
          <p>Menu</p>
          <a href="Cadastro-Cliente.php">Crie sua conta</a>
          <a href="Login-Client.php">Login</a>
          <a href="index_empresa.php">Divulgar</a>
        </div>
        <div class="contato">
          <p>Institucional</p>
          <a href="http://sitesaturnooficial.atwebpages.com/">Quem somos</a>
          <a href="#">Trabalhe conosco</a>
          <a href="#">Suporte</a>
        </div>
        <div class="redes">
          <p>Rede Sociais</p>
          <a href="#"><img src="resources/images/icon/instagram-alt-logo-180.png"></a>
          <a href="#"><img src="resources/images/icon/facebook-circle-logo-180.png"></a>
          <a href="#"><img src="resources/images/icon/twitter-logo-180.png"></a>
        </div>
      </div>

    </footer>
    <div class="cop">
      <p>&copy;2021, Anpere - Rua Feliciano de Mendonça, 290 - Guaianazes, São Paulo - Todos os direitos reservados.</p>
    </div>
  </div>


  <script>
    $(".carousel").owlCarousel({
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1,
          dots: false
        },
        600: {
          items: 2,
          dots: false
        },
        1000: {
          items: 3,
          dots: false
        }
      }
    });
  </script>
</body>

</html>