<?php

  include_once("../Session/valida-sessao.php");
  include_once("../resources/estrutura/nav.php");
  //a página alvo deve ser levada em consideração o caminho do arquivo em que a função foi chamada!
  //em caso de erro na sessão, o retorno de página deverá ser a url como parâmetro!
  //o segundo parâmetro é referente ao nível de autorização que está sendo verificado!
  Valida::ValidaSessao("../index.php", "cliente");

  require_once('../global_two.php');

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
    <link rel="stylesheet" href="../resources/css/indexRestrita.css" media="screen">
    

    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <title>Anpere</title>
  </head>

  <body>

  <div id="popupCod" class="popupCod">
    <div class="cabecalho">
      <div class="sair"><button onclick="fechar3()"> <i class="fas fa-times"></i> </button></div>
      <div class="chave"><img src="../resources/images/icon/chave.png"></div>
      <div class="titulo"><p> Código de segurança </p></div>
      <div class="subtitulo"><center><p> Para realizar a avaliação do produto/serviço, digite o código de segurança (verifique seu Email) </center></div>
    </div>

    <div class="conteudo">
      <div class="entradacod"><input placeholder="LOJ848F" type="text"></div>
      <div class="botaoconfirmar"><button>Confirmar</button></div>
      <div class="botaocancelar"><button onclick="fechar3()">Cancelar</button></div>
    </div>
  </div>

  <div id="popup2" class="popupComent">

  <div class="cabeca">

  <div class="titulo"><p class="pc"> Comentários de clientes </p> <p class="pb"> Avaliações de consumidores deste serviço:</p></div>
  <div class="sair"> <button onclick="fechar2()"> <i class="fas fa-times"></i> </button> </div>

  </div>

<div class="conteudo">

  <div class="comentarios">

  <div class="comentario">

<div class="usuario"> <img src="../resources/images/perfil.png"> </div>

<div class="avaliacao">
  <div class="nome"> <p> Nome do cliente </p></div>
  <div class="textoavaliacao">
    <div class="textoo"> <p> "Aqui o texto do cliente avaliando" </p>  </div>
    <div class="estrelas"><p> Nota: 5 estrelas </p>
          </div>
  </div>
</div>

</div>


<div class="comentario">

<div class="usuario"> <img src="../resources/images/perfil.png"> </div>

<div class="avaliacao">
  <div class="nome"><p> Nome do cliente </p> </div>
  <div class="textoavaliacao">
    <div class="textoo"> <p>"Aqui o texto do cliente avaliando"</p> </div>
    <div class="estrelas"><p> Nota : 5 estrelas</div>
  </div>
</div>

</div>

<div class="vermais"><center> <p> Ver mais... </p> </center></div>

  </div>

<div class="adicionar">
  <div class="titulo"><p>Qual a sua nota?</p></div>
  <div class="estrelinha"> <div class='rating3 rating4'><!--
              --><a href='#5' title='Give 5 stars'>★</a><!--
              --><a href='#4' title='Give 4 stars'>★</a><!--
              --><a href='#3' title='Give 3 stars'>★</a><!--
              --><a href='#2' title='Give 2 stars'>★</a><!--
              --><a href='#1' title='Give 1 star'>★</a>
            </div></div>
            <div class="textarea"><textarea placeholder="Digite aqui seu comentário..."></textarea></div>
            <div class="botaoad"><button onclick="abrir5()">Enviar</button></div>
  </div>
</div>
  </div>


  </div>

  <div class="categorias">
  <br>

        <div class="icones">
        <a href="busca_cliente.php?category=4"><div class="ct"><img src="../resources/images/auau.png"></div></a>
        <a href="busca_cliente.php?category=10"><div class="ct"><img src="../resources/images/sofa.png"></div></a>
        <a href="busca_cliente.php?category=1"><div class="ct"><img src="../resources/images/sedan.png"></div></a>
        <a href="busca_cliente.php?category=16"><div class="ct"><img src="../resources/images/guitarra.png"></div></a>
        <a href="busca_cliente.php?category=9"><div class="ct"><img src="../resources/images/cabide.png"></div></a>
        <a href="busca_cliente.php?category=6"><div class="ct"><img src="../resources/images/brinquedo.png"></div></a>
        <a href="busca_cliente.php?category=2"><div class="ct"><img src="../resources/images/chave-inglesa.png"></div></a>
        <a href="busca_cliente.php?category=18"><div class="ct"><img src="../resources/images/estetoscopio.png"></div></a>
        <a href="busca_cliente.php?category=13"><div class="ct"><img src="../resources/images/bla.png"></div></a>
        <a href="busca_cliente.php?keyword=&endereco="><div class="ct"><img src="../resources/images/outros.jpg"></div></a>
      </div>
      <div class="icones">
        <div class="ct2"><label>Animais</label></div>
        <div class="ct2"><label>Moveis</label></div>
        <div class="ct2"><label>Auto peças</label></div>
        <div class="ct2"><label>Música</label></div>
        <div class="ct2"><label>Roupas</label></div>
        <div class="ct2"><label>Infantil</label></div>
        <div class="ct2"><label>Assistencia</label></div>
        <div class="ct2"><label>Saúde</label></div>
        <div class="ct2"><label>Esporte</label></div>
        <div class="ct2"><label>Outros</label></div>
      </div>
      <br>
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
              <button type="submit">Procurar</button>
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
              <img <?php echo "src='../resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?> alt="Empresa foto estabelecimento">
            </div>
            <div class="texts">
              <h3><?php echo $empresas['nomeEmpresa']; ?></h3>
              <p><?php echo ("Rua " . $empresas['logradouroEmpresa'] . " - " . $empresas['bairroEmpresa'] . ", " . $empresas['estadoEmpresa']); ?></p>
            </div>

            <div class='estrelas'>
              <div class='rating rating2'>
              <a href='#5' title='Give 5 stars'>★</a><!--
              --><a href='#4' title='Give 4 stars'>★</a><!--
              --><a href='#3' title='Give 3 stars'>★</a><!--
              --><a href='#2' title='Give 2 stars'>★</a><!--
              --><a href='#1' title='Give 1 star'>★</a>
            </div>
            <div class="detalhes"> </div>
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
              <img <?php echo "src='../resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?> alt="Empresa foto estabelecimento">
            </div>
            <div class="texts">
              <h3><?php echo $empresas2['nomeEmpresa']; ?></h3>
              <p><?php echo ("Rua " . $empresas2['logradouroEmpresa'] . " - " . $empresas2['bairroEmpresa'] . ", " . $empresas2['estadoEmpresa']); ?></p>
            </div>

            <div class='estrelas'>
              <div class='rating rating2'><!--
              --><a href='#5' title='Give 5 stars'>★</a><!--
              --><a href='#4' title='Give 4 stars'>★</a><!--
              --><a href='#3' title='Give 3 stars'>★</a><!--
              --><a href='#2' title='Give 2 stars'>★</a><!--
              --><a href='#1' title='Give 1 star'>★</a>
            </div>
          </div>

          <div class="coment"><button onclick="abrir()">Ver comentários</button></div>
            <div class="button">
            <a href="perfilEmpresa.php?id=<?php echo $empresas['idEmpresa'];?>"><button>Mais</button></a>
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
                <div class="button">
                  <a href="../index_empresa.php"><button>Divulgar</button></a>
                </div>
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

    <script src="../resources/js/script.js">
    </script>

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


      function fechar3() {
  document.getElementById('popupCod').style.display="none";
  document.getElementById('popupCod').style.visibility="hidden";
}

function abrir5(){
  document.getElementById('popupCod').style.display="grid";
  document.getElementById('popupCod').style.visibility="visible";

    }
    </script>
  </body>

  </html>



</body>

</html>