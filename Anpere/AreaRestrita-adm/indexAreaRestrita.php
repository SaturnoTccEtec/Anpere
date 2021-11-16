
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../resources/css/indexAdm.css" media="screen">
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
     
    </script>

    <?php 
      include_once("../Session/valida-sessao.php");
      //a página alvo deve ser levada em consideração o caminho do arquivo em que a função foi chamada!
      //em caso de erro na sessão, o retorno de página deverá ser a url como parâmetro!
      //o segundo parâmetro é referente ao nível de autorização que está sendo verificado!
      Valida::ValidaSessao("../index.php", "adm");
    
    ?>

    <script>

      function puxarVariavel(){

      }

      </script>

    <?php

     ?>

    <style>
            .div-grafic{
                float:center;
                width:40%;
            }

    </style>

   </head>
<body>

<?php  require_once('../global_two.php');

$pdo = Connection::GET_PDO();

if(empty($_GET["cidade"])){
  $cidade = "...";
  $numeroClientes=0;
  $numeroEmpresas=0;
}

else{

  $cidade = $_GET["cidade"];

  $sql6 = "SELECT nomeCliente FROM tbcliente WHERE cidadeCliente='$cidade'";
    $stm6 = $pdo->prepare($sql6);
    $stm6->execute();
    $numRows6 = $stm6->rowCount();


    $sql7 = "SELECT nomeEmpresa FROM tbempresa WHERE cidadeEmpresa='$cidade'";
    $stm7 = $pdo->prepare($sql7);
    $stm7->execute();
    $numRows7 = $stm7->rowCount();

    $numeroClientes=$numRows6;
    $numeroEmpresas = $numRows7;

}


$pdo = Connection::GET_PDO(); ?>
  <div class="sidebar">
    <div class="logo-details">
    <center> <img src="../resources/images/LogoAnpere.png" width="50%"> </center>
    </div>

    <li>
       <a class="selecionado" href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
   
     
      <li>
       <a href="AvaliarCliente.php">
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
          
           <div class="name_job">
             <div class="name">Anpere</div>
         
           </div>
         </div>
         <a href="../Session/destruirSessao.php?pagina=Login-Adm.php"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">

  <main class="cards">
        <section class="card contact">

        <?php   $sql = "SELECT * FROM tbcliente";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $numRows = $stm->rowCount();
    
    echo'<h3>'.$numRows.'</h3>';?>
         
            
            <span>Clientes cadastrados.</span>
          
        </section>
        <section class="card shop">

        <?php   $sql = "SELECT * FROM tbempresa";
    $stm2 = $pdo->prepare($sql);
    $stm2->execute();
    $numRows2 = $stm2->rowCount();
    
    echo'<h3>'.$numRows2.'</h3>';?>
            <span>Empresas cadastradas.</span>
          
        </section>
        <section class="card about">

            
            <h3>0</h3>
            <span>Parcerias realizadas</span>
          
        </section>

        <section class="card about">

        <?php   $sql = "SELECT * FROM tbavaliacao";
    $stm3 = $pdo->prepare($sql);
    $stm3->execute();
    $numRows3 = $stm3->rowCount();
    
    echo'<h3>'.$numRows3.'</h3>';?>


            <span>Avaliações realizadas</span>
          
        </section>
    </main>

    <div class="container">
    <div class="cidades">
      <br>
        <table>
            <tr>
                <th class="th">Cidades:</th>
    </tr>
    
        <?php

    
    
        try {
            $stmt = $pdo -> prepare("select distinct cidadeCliente from tbcliente");
    
            $stmt -> execute();
    
    
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){


                echo('<tr>');
               echo('<td><a href="indexAreaRestrita.php?cidade='.$row['cidadeCliente'].'">'); print $row['cidadeCliente']; echo('</a></td>');
               $city= $row['cidadeCliente'];
               
              
            };

           
    
        } catch (PDOException $e) {
            print "Erro: " . $e->getMessage();
        }
       
       
    
        ?>
    
    </table>
      </div>

      <?php
      

      echo('<input type="hidden" id="numeroCliente">');
    echo('<input type="hidden" id="numeroEmpresa">');

      
      echo("
  <script type='text/javascript'>
    google.charts.load('current', {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Element', 'quantidade:', { role: 'style' } ],
        ['Clientes', $numeroClientes, 'color: #407cee'],
        ['Empresas', $numeroEmpresas, 'color: #407cee'],
        
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: 'stringify',
                         sourceColumn: 1,
                         type: 'string',
                         role: 'annotation' },
                       2]);

      var options = {
        title: 'Número de clientes e empresas na região de $cidade',
        width: 600,
        height: 300,
        bar: {groupWidth: '95%'},
        legend: { position: 'none' },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
      chart.draw(view, options);
  }
  </script>"); ?>

      <div class="grafico"> 

      <section> 
                <div class="div-grafic">
                  <!--Div that will hold the pie chart-->
                  <div id="chart_div"></div>
                </div>

                <div class="div-grafic">
               
                     <div id="columnchart_values" style="width: 450px; height: 300px;"></div>

              </div>
      </section>
    
      </div>

      <div class="outro">
      </div>
     

      </div>

  </section>
</body>
</html>