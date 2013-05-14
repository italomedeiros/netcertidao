<?php

include("config.php");

$cnpj = $_GET['cnpj'];
$escritorio = $_GET['emp'];
$usuario = $_GET['usu'];

//delete1
mysql_query("DELETE FROM fila_execucao 
            WHERE certidao_contratada_cnpj_idCnpj = '$cnpj'")
        or die("ERRO NO SQL 1: " . mysql_error());

//delete2
mysql_query("DELETE FROM certidao_processada 
            WHERE certidao_contratada_cnpj_idCnpj = '$cnpj'")
        or die("ERRO NO SQL 2: " . mysql_error());

//delete3
mysql_query("DELETE FROM certidao_contratada 
            WHERE cnpj_idCnpj = '$cnpj' AND empresa_idEscritorio = '$escritorio'")
        or die("ERRO NO SQL 3: " . mysql_error());

$consulta = mysql_query("SELECT cnpj_idCnpj FROM cnpj_empresa WHERE cnpj_idCnpj = '$idCnpj'
                    AND empresa_idEscritorio = '$escritorio'")
        or die("ERRO NO SQL: 12" . mysql_error());

//delete4
mysql_query("DELETE FROM cnpj_empresa 
            WHERE cnpj_idCnpj = '$cnpj' AND empresa_idEscritorio = '$escritorio'")
        or die("ERRO NO SQL 4: " . mysql_error());

if (mysql_num_rows($consulta) <= 1)
{
    //delete5
    mysql_query("DELETE FROM cnpj 
        WHERE idCnpj = '$cnpj'")
            or die("ERRO NO SQL 5: " . mysql_error());
}
?>