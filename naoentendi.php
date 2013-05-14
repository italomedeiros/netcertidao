<?php
    include("idCaptcha.php");     
    $dt_atual = date("Y-m-d");
    $login = $_POST['login'];
    $task_id = $_POST['task_id'];
    $scripts_idScript = $_POST['scripts_idScript'];
    
 
    mysql_query("INSERT INTO log_captcha (dataHora, operador_captcha_login, task_id, scripts_idScript, status) 
                           VALUES ('$dt_atual', '$login', '$task_id', '$scripts_idScript', 'NAO SEI')");
    
    
    
    
    $sql_fila = mysql_query("UPDATE fila_captcha SET texto = 'naoentendi' WHERE idCaptcha = $idCaptcha") 
        or die("ERRO NO SQL: " . mysql_error());
    //$sql_log = mysql_query("INSERT INTO log_captcha ()");
    
    echo ("<meta http-equiv='refresh' content='1;URL=controle-captcha.php'>");
?>
