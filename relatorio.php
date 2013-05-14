<?php
include("config.php");
function readCnpj()
{
    $idCnpj = 'idCnpj';
    $read = mysql_query("SELECT * FROM cnpj WHERE idCnpj = '$idCnpj'") or die("ERRO NO SQL: " . mysql_error());

    if (mysql_num_rows($read) == 1)
    {
        $row = mysql_fetch_array($read);
        $idCnpj = $row['idCnpj'];
        $razao_social = $row['razao_social'];
        $inscricao_estadual = $row['inscricao_estadual'];
        $inscricao_municipal = $row['inscricao_municipal'];
        $UF = $row['uf'];

        echo ("CNPJ: " .$idCnpj);
        echo ("Razão Social: " .$razao_social);
        echo ("Inscrição Estadual: " .$inscricao_estadual);
        echo ("Inscrição Municipal: " .$inscricao_municipal);
        echo ("UF: " .$UF);
    }
    else
    {
        echo ("Read CNPJ registro nao encontrado!");
    }
}
?>
