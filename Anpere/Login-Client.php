<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">

  <title>Anpere - entre ou cadastre-se</title>
  <link href="images/LogoAnpere.png" rel="icon">
  <link rel="stylesheet" href="css/login.css" media="screen">
  <!-- Importando as fonts -->

  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">

  <!---->

</head>

<body>
  <div class="container">

  <!----------- GRID LADO ESQUERDO --------------->
      <div class="left-side">
        <img src="images/LogoAnpere.png">
        <h4 class="login">Login</h4>
        <div class="txt-lf"><p>Entre com:</p></div>

        <form method="POST" action="verificar-cliente.php" class="form">
          <label>CPF:</label><br>
          <input id="loginCliente" name="txtClienteLogin" type="text"required><br>
          <label> Senha:</label><br>
          <input id="clienteSenha" name="txtClienteSenha" type="password"required><br>
          <button type="submit">Entrar</button>
        </form>

        <div class="txt-lf-2"><a href="Cadastro-Cliente.php">Não possuo cadastro</a></div>
      </div>

      <!----->

      <!----------- GRID LADO DIREITO --------------->


    <div class="right-side">
      <div class="txt-rg">
        <h3>Bem vindo de volta</h3>
        <p>Busque e preste os melhores serviços da região!<br></p>
      </div>
      <img src="images/fotoLoginCliente.png">
    </div>
  </div>

  <!----->
</body>

</html>