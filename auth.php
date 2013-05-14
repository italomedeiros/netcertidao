<?php
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

include ("config.php");

$sql = "SELECT * FROM operador_captcha WHERE login = '$login' AND senha = '$senha'";
$rs = mysql_query($sql, $conn);
$num = mysql_num_rows($rs);

if ($num > 0)/* && ($_SESSION['captcha'] == $_POST['captcha'])*/ {
    $rst = mysql_fetch_array($rs);
    $nome = $rst['nome'];
    
    mysql_query("UPDATE operador_captcha SET status = 1 WHERE login = '$login'")
            or die("ERRO NO SQL: " . mysql_error());
    
    //session_start();
    $_SESSION['nome'] = $nome;
    $_SESSION['login'] = $login;
    
    setcookie("login_cookie", $login);
    
    mysql_close($conn);
    header("Location:controle-captcha.php");
} else {
    mysql_close($conn);
    echo ("<div style='padding:10px; border:1px solid #F00; background:#FDD; font:16px Tahoma, Geneva, sans-serif;' align='center'><b>Usu&aacute;rio e/ou Senha Inv&aacute;lidos!<br />Captcha Incorreto!</b></div>");
    echo ("<meta http-equiv='refresh' content='3;URL=login.php'>");
}
?>