<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../resources/css/index.css" media="screen">

  <link href="../resources/images/LogoAnpere.png" rel="icon">
  <title>Document</title>


  <?php
  require_once('../global_two.php');
  include_once("../Session/valida-sessao.php");
  include_once("../resources/estrutura/nav.php");
  //a página alvo deve ser levada em consideração o caminho do arquivo em que a função foi chamada!
  //em caso de erro na sessão, o retorno de página deverá ser a url como parâmetro!
  //o segundo parâmetro é referente ao nível de autorização que está sendo verificado!
  Valida::ValidaSessao("../index.php", "empresa");

  $listar = new Categoria();
  $lista = $listar->listarCategoria();

  //LISTANDO EMPRESAS

  $empresa = new Empresa();
  $listaEmpresas = $empresa->listarEmpresasParceria();

  ?>
</head>

<body>
<div class="container-two">
      <form method="GET" action="busca_empresa.php?cnpj=<?php echo $cnpj?>">
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
        <h3>Empresas disponíveis para parceria</h3>
      </div>

      <div class="main-two">

      <?php
        foreach ($listaEmpresas as $empresas) {
          $perfilempresa = new PerfilEmpresa();
          $imagemPerfil = $perfilempresa->listarImagensIndex($empresas['idEmpresa']);
        ?>
          <div class="card">
            <div class="image">
              <img <?php echo "src='../resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?> alt="Empresa foto estabelecimento">
            </div>
            <div class="texts">
              <h3><?php echo $empresas['nomeEmpresa']; ?></h3>
              <p><?php echo ("Rua " . $empresas['logradouroEmpresa'] . " - " . $empresas['bairroEmpresa'] . ", " . $empresas['estadoEmpresa']); ?></p>
            </div>
            <div class="button">
            <a href="perfilEmpresa_empresa.php?id=<?php echo $empresas['idEmpresa']; ?>"><button>Mais</button></a>
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
                <p class="p">Descubra próximas a você!</p>
              </div>


              <div class="item1-2">
                <img src="../resources/images/busque.png" alt="">
              </div>

            </div>
            <div class="item">
              <div class="item1-1">
                <h3>DIVULGUE E FORME PARCERIAS</h3>
                <p class="p2">Divulgue seus melhores serviços na plataforma.</p>
                <p class="p2-2">Forme parcerias com outras empresas e cresçam juntas no mercado!</p>
              </div>


              <div class="item1-2">
                <img src="../resources/images/ui-ux-design-banner.png" alt="">
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
            <a href="#"><img src="../resources/images/icon/instagram-alt-logo-180.png"></a>
            <a href="#"><img src="../resources/images/icon/facebook-circle-logo-180.png"></a>
            <a href="#"><img src="../resources/images/icon/twitter-logo-180.png"></a>
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