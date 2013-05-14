<?php
    include("config.php");

    $login = $_GET['login'];
    $senha = $_GET['senha'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $hab = $_GET['hab'];
    
    $update = mysql_query("UPDATE usuario SET senha = '$senha', nome = '$nome', email = '$email', status = '$hab'
            WHERE login = '$login'")
            or die("ERRO NO SQL: " . mysql_error());

    if ($update)
    {
        echo ("Update-Usuario sucesso!");
    }
    else
    {
        echo ("Update-Usuario erro!");
    }
?>