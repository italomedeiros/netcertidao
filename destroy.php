<?php

include ("config.php");

 $status = mysql_query("UPDATE operador_captcha SET status = 0 WHERE login = '".$_POST['logindestroy']."'")
            or die("ERRO NO SQL: " . mysql_error());
 
 $idCaptchadestroy = mysql_query("UPDATE fila_captcha SET flag = 0 WHERE idCaptcha = '".$_POST['idCaptchadestroy']."'")
            or die("ERRO NO SQL: " . mysql_error());


session_start();
session_unset();
session_destroy();
header("Location:login.php");
?> 