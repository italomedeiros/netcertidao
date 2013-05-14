<?php

include ("config.php");

$texto = $_POST['texto'];
$login = $_POST['login'];
//$dt_atual = date("d-m-Y H:i:s");
$idCaptcha = $_POST['idCaptcha'];
$task_id = $_POST['task_id'];
$scripts_idScript = $_POST['scripts_idScript'];


//ATUALIZA TIMEOUT
$dt_update = date('Y-m-d H:i:s');

mysql_query("UPDATE operador_captcha SET timeout_session = '$dt_update' WHERE login = '$login'");

mysql_query("UPDATE fila_captcha SET texto = '$texto' WHERE idCaptcha = $idCaptcha");

mysql_query("INSERT INTO log_captcha (idLogCaptcha, dataHora, operador_captcha_login, task_id, scripts_idScript, status) 
                           VALUES (null, NOW(), '$login', $task_id, $scripts_idScript, 'OK')");

echo ("<meta http-equiv='refresh' content='1;URL=controle-captcha.php'>");
?>
