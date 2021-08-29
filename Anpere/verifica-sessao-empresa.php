<?php

   session_start();
   if((!isset($_SESSION['autorizacao'])==true)){
       unset($_SESSION['autorizacao']);
       session_destroy();
       header("Location:Login-Empresa.php");
   }

?>
//quem for trabalhar, usa esse aqui para verificar sessão de empresa em qualquer arquivo/pagina que quiser 