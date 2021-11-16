<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/adm.css" media="screen">
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Anpere - Adm</title>
</head>
<body>

    
<div class="sidebar">
    <div class="logo-details">
        <center> <img src="../resources/images/LogoAnpere.png" width="50%"> </center>
    </div>

    <li>
       <a href="indexAreaRestrita.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
   
     
      <li>
       <a class="selecionado" href="AvaliarCliente.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Avaliar Cliente</span>
       </a>
       <span class="tooltip">Avaliar Cliente</span>
     </li>
     <li>
        <a href="AvaliarEmpresa.php">
          <i class='bx bx-user' ></i>
          <span class="links_name">Avaliar Empresa</span>
        </a>
        <span class="tooltip">Avaliar Empresa</span>
      </li>
    
 
   
     <li class="profile">
         <div class="profile-details">
         </div>
         <a href="../Session/destruirSessao.php?pagina=Login-Adm.php"> <i class='bx bx-log-out' id="log_out"></i> </a>
     </li>
    </ul>
  </div>


  
  <section class="home-section">
    <br>

     <div class="LadoDireito">
     <div class="container">

<p> Cadastrar Cliente <a href="Cadastro-Cliente.php"> <button onclick="redirectPage()">Clique aqui</button> </a> </p>
</div>

</div>


<div class="container2">

    <div class="LadoDireito">

<form action="pesquisarCPF.php" method="POST">
    <p> Avaliar Clientes <input name="txtCpf" type="number" placeholder="  Pesquisar por CPF" class="input">
         <button type="submit">Pesquisar</button> </p>  </form>
    
        <table>
            <tr>
                <th class="th">Nome:</th>
                <th class="th cpf">CPF:</th>
                <th class="th email">Email:</th>
                <th class="th senha">Senha:</th>
                <th class="th logradouro">Logradouro:</th>
                <th class="th estado">Estado:</th>
                <th class="th cidade">Cidade:</th>
                <th class="th bairro">Bairro:</th>
                <th class="th cep">CEP:</th>
                <th class="th numero">Número:</th>
    </tr>
    
        <?php
  require_once('../global_two.php');
        $pdo = Connection::GET_PDO();

        if(empty($_GET["cpf"])){

        try {
            $stmt = $pdo -> prepare("select * from tbCliente");
    
            $stmt -> execute();
        
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                $CPF = $row['cpfCliente'];
    
                echo('<tr>');
               echo('<td>'); print $row['nomeCliente']; echo('</td>');
               echo('<td class="cpf">'); print $row['cpfCliente']; echo('</td>');
               echo('<td class="email">'); print $row['emailCliente']; echo('</td>');
               echo('<td class="senha">'); print $row['senhaCliente']; echo('</td>');
               echo('<td class="logradouro">'); print $row['logradouroCliente']; echo('</td>');
               echo('<td class="estado">'); print $row['estadoCliente']; echo('</td>');
               echo('<td class="cidade">'); print $row['cidadeCliente']; echo('</td>');
               echo('<td class="bairro">'); print $row['bairroCliente']; echo('</td>');
               echo('<td class="cep">'); print $row['cepCliente']; echo('</td>');
               echo('<td class="numero">'); print $row['numEndCliente']; echo('</td>');
               echo('</tr>');
            };
    
        } catch (PDOException $e) {
            print "Erro: " . $e->getMessage();
        }
      }
      else{
        $cpf = $_GET["cpf"];

        $stmt = $pdo -> prepare("select * from tbCliente where cpfCliente = '$cpf'");
    
            $stmt -> execute();
        
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                $CPF = $row['cpfCliente'];
    
                echo('<tr>');
               echo('<td>'); print $row['nomeCliente']; echo('</td>');
               echo('<td class="cpf">'); print $row['cpfCliente']; echo('</td>');
               echo('<td class="email">'); print $row['emailCliente']; echo('</td>');
               echo('<td class="senha">'); print $row['senhaCliente']; echo('</td>');
               echo('<td class="logradouro">'); print $row['logradouroCliente']; echo('</td>');
               echo('<td class="estado">'); print $row['estadoCliente']; echo('</td>');
               echo('<td class="cidade">'); print $row['cidadeCliente']; echo('</td>');
               echo('<td class="bairro">'); print $row['bairroCliente']; echo('</td>');
               echo('<td class="cep">'); print $row['cepCliente']; echo('</td>');
               echo('<td class="numero">'); print $row['numEndCliente']; echo('</td>');
               echo('<td class="icone"> <a href="alteraçãoCliente.php?cpf='.$CPF.'"><img src="../images/editar.png"></a> </td>');
               echo ('<td class="icone"> <a href="excluirCliente.php?cpf='.$CPF.'">  <img src="../images/excluir.jpg"> </a>');
               echo('</tr>');

      }}
       
       
    
        ?>
    
    </table>
    
    </div>


      </div>

     
  </section>
</div>



</body>

</html>