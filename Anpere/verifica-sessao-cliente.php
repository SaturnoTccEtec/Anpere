<?php

   session_start();
   if((!isset($_SESSION['autorizacao'])==true)){
       unset($_SESSION['autorizacao']);
       session_destroy();
       header("Location:Login-Client.php");
   }

?>
//quem for trabalhar, usa esse aqui para verificar sessão de cliente em qualquer arquivo/pagina que quiser 