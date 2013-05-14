<?php

    include("config.php");

    $idEscritorio = $_GET['idEsc'];
    $razao_social = $_GET['rsoc'];
    $cnpj = $_GET['cnpj'];
    $endereco = $_GET['end'];
    $cep = $_GET['cep'];
    $uf = $_GET['uf'];
    $cidade = $_GET['cid'];
    $bairro = $_GET['bair'];
    $contato = $_GET['cont'];
    $telefone = $_GET['tel'];
    $email = $_GET['email'];

    mysql_query("INSERT INTO empresa (idEscritorio, razao_social, cnpj, endereco,
            cep, bairro, telefone, uf, cidade, contato, email) 
            VALUES ('$idEscritorio', '$razao_social', '$cnpj', '$endereco',
            '$cep', '$bairro', '$telefone', '$uf', '$cidade', '$contato', '$email')")
            or die("ERRO NO SQL: " . mysql_error());
?>
