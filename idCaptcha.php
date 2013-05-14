<?php

include("config.php");

$readfila = mysql_query("SELECT idCaptcha, nome, task_id, scripts_idScript FROM fila_captcha
	INNER JOIN scripts
    ON fila_captcha.scripts_idScript = scripts.idScript AND (fila_captcha.flag = '".$_COOKIE["login_cookie"]."' or fila_captcha.flag = 0) AND (texto = '' or texto is null) AND (imagem is not null) ORDER BY idCaptcha ASC LIMIT 1");

$row = mysql_fetch_array($readfila);
$idCaptcha = $row['idCaptcha'];



if (mysql_num_rows($readfila) == 1)
{
    mysql_query("UPDATE fila_captcha SET flag = '".$_COOKIE["login_cookie"]."' WHERE idCaptcha = '$idCaptcha'");
    $nomeScript = $row['nome'];
    $task_id = $row['task_id'];
    $scripts_idScript = $row['scripts_idScript'];
    $html = "<meta http-equiv='refresh' content='120;URL=controle-captcha.php'>";
    
}
else if (mysql_num_rows($readfila) == 0)
{
    $nomeScript = "Não há captchas pendentes! Atualizando em 10 segundos...";
    $html = "<meta http-equiv='refresh' content='10;URL=controle-captcha.php'>";
}
//Diz quantos Captchas estão pendentes na "controle-captcha"
$count_fila = mysql_query("SELECT COUNT(*) as num FROM fila_captcha WHERE flag = 0");
$num = mysql_fetch_array($count_fila);
$numero_fila = "Existem " . $num['num'] . " Captchas a serem Digitados.";
?>
