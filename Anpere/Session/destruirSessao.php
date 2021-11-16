<?php
$target = $_GET['pagina'];
//Observação: Independente da instância, a session sempre deve ser iniciada antes de ser destruída!!!
session_start();
session_destroy(); 
header("Location: ../$target");
  ?>