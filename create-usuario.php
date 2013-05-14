<?php

    include("config.php");

    $login = $_GET['login'];
    $senha = $_GET['senha'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $posto = 'LMT';
    $dt_cadastro = date("Y-m-d");
    $empresa_idEscritorio = $_GET['idEsc'];
    $hab = $_GET['hab'];

    $create = mysql_query("INSERT INTO usuario (login, senha, nome, email, posto, dt_cadastro, empresa_idEscritorio, status) 
        VALUES ('$login', '$senha', '$nome', '$email', '$posto', '$dt_cadastro', '$empresa_idEscritorio', '$hab')")
            or die("ERRO NO SQL: " . mysql_error());

    if ($create)
    {
        echo ("Create-Usuario sucesso!");
    }
    else
    {
        echo ("Create-Usuario erro!");
    }
?>
