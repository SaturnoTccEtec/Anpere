<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">

  <title>Anpere - Entre</title>
  <link href="resources/images/LogoAnpere3.png" rel="icon">
  <link rel="stylesheet" href="resources/css/login.css" media="screen">

  <!-- Importando as fonts -->

  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">

  <!---->
  <?php
  //Bloco responsável por verificar se já existe um login!
  include_once("Session/valida-sessao.php");
  Valida::ValidaLogin("./AreaRestrita-Empresa/indexAreaRestrita.php", "empresa");
  ?>
</head>

<body>
  <div class="container">

    <!----------- GRID LADO ESQUERDO --------------->
    <div class="left-side">
      <img src="resources/images/LogoAnpere.png">
      <h4 class="login">Login</h4>
      <div class="txt-lf">
        <p>Entre com:</p>
      </div>

      <form method="POST" action="Session/verificar-empresa.php" class="form">
        <label>CNPJ:</label><br>
        <input id="loginEmpresa" name="txtEmpresaLogin" type="text" required><br>
        <label> Senha:</label><br>
        <input id="empresaSenha" name="txtEmpresaSenha" type="password" required><br>
        <button type="submit">Entrar</button>
      </form>

      <div class="txt-lf-2"><a href="Cadastro-Empresa.php">Não possuo cadastro</a></div>
    </div>


    <div class="right-side">
      <div class="txt-rg">
        
    </div>
  </div>
</body>

</html>