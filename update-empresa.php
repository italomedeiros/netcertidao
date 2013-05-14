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

    $update = mysql_query("UPDATE empresa SET razao_social = '$razao_social', cnpj = '$cnpj', endereco = '$endereco', cep = '$cep',
            bairro ='$bairro', telefone ='$telefone', uf ='$uf', cidade ='$cidade', contato = '$contato', email = '$email' 
      WHERE idEscritorio = '$idEscritorio'")
            or die("ERRO NO SQL: " . mysql_error());
    
    $update_cnpjs = mysql_query("UPDATE cnpj SET email = '$email' WHERE idEscritorio = '$idEscritorio'")
            or die("ERRO NO SQL: " . mysql_error());

    if ($update && $update_cnpjs)
    {
        echo ("updateEmpresa- Sucesso!");
    }
    else
    {
        echo ("updateEmpresa- Erro!");
    }
?>