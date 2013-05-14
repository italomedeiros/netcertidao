<?php

include("config.php");

$login = $_GET['login'];
$dt_update = date("Y-m-d");
$updtime = mysql_query("UPDATE operador_captcha SET timeout_session = '$dt_update' WHERE login = '$login'")
        or die("ERRO NO SQL: " . mysql_error());
if ($updtime)
{
    echo 'SUCESSO';
}
else
{
    echo 'ERRO';
}
?>
