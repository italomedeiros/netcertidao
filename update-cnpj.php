<?php

include("config.php");

$empresa_idEscritorio = $_GET['emp'];
$idCnpj = $_GET['cnpj'];
$razao_social = rawurldecode($_GET['rs']);
$inscricao_estadual = $_GET['ie'];
$inscricao_municipal = $_GET['im'];
$UF = $_GET['uf'];
$cidade = $_GET['cid'];
$decode = rawurldecode($cidade);
$cpf_mg = $_GET['cpf'];
$senha_mg = $_GET['sen'];
$senha_rf = $_GET['sen2'];
$email2 = $_GET['em2'];
$email3 = $_GET['em3'];

$freq_sefaz = $_GET['pfaz'];
$freq_sefin = $_GET['pfin'];
$freq_crf = $_GET['pcrf'];
$freq_dp3 = $_GET['pdp3'];
$freq_srf = $_GET['psrf'];
$freq_dp1 = $_GET['pdp1'];

$sefaz = $_GET['faz'];
$sefin = $_GET['fin'];

$dp1 = $_GET['dp1'];
$dp3 = $_GET['dp3'];
$crf = $_GET['crf'];
$srf = $_GET['srf'];

$script = array();
$script[0] = 49; //MA
$script[1] = 58; //SP
$script[2] = 60; //PortoAlegre
$script[3] = 61; //BeloHorizonte
$script[4] = 62; //Recife
$script[5] = 63; //RN
$script[6] = 67; //PR
$script[7] = 20; //ES
$script[8] = 21; //PE
$script[9] = 23; //DF
$script[10] = 24; //CE
$script[11] = 25; //GO
$script[12] = 26; //TO
$script[13] = 27; //MG
$script[14] = 31; //Vitoria
$script[15] = 32; //Natal
$script[16] = 33; //Florianopolis
$script[17] = 43; //AL
$script[18] = 45; //Salvador
$script[19] = 47; //Palmas
$script[20] = 56; //Fortaleza
$script[21] = 66; //Caucaia

$nome = array();
$nome[0] = "MA";
$nome[1] = "SP";
$nome[2] = "Porto Alegre";
$nome[3] = "Belo Horizonte";
$nome[4] = "Recife";
$nome[5] = "RN";
$nome[6] = "PR";
$nome[7] = "ES";
$nome[8] = "PE";
$nome[9] = "DF";
$nome[10] = "CE";
$nome[11] = "GO";
$nome[12] = "TO";
$nome[13] = "MG";
$nome[14] = "Vitoria";
$nome[15] = "Natal";
$nome[16] = "Florianopolis";
$nome[17] = "AL";
$nome[18] = "Salvador";
$nome[19] = "Palmas";
$nome[20] = "Fortaleza";
$nome[21] = "Caucaia";

mysql_query("UPDATE cnpj SET razao_social = '$razao_social', inscricao_estadual = '$inscricao_estadual',
        inscricao_municipal = '$inscricao_municipal', uf = '$UF', cidade = '$decode', cpf = '$cpf_mg', 
        senha = '$senha_mg', senha_rf = '$senha_rf', email2 = '$email2', email3 = '$email3'
            WHERE idCnpj = '$idCnpj'")
        or die("ERRO NO SQL(1): " . mysql_error());

//SEFAZ&SEFIN--INICIO
for ($i = 0; $i < 22; $i++)
{
    if ($UF == $nome[$i])
    {
        if ($sefaz == "0")
        {
            //delete1
            mysql_query("DELETE FROM fila_execucao 
                    WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                    AND certidao_contratada_scripts_idScript = $script[$i]")
                    or die("ERRO NO SQL 1: " . mysql_error());

            //delete2
            mysql_query("DELETE FROM certidao_processada 
                                    WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                                    AND certidao_contratada_scripts_idScript = $script[$i]")
                    or die("ERRO NO SQL 2: " . mysql_error());

            //delete3
            mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                                    AND scripts_idScript = $script[$i]
                                    AND empresa_idEscritorio = '$empresa_idEscritorio'")
                    or die("ERRO NO SQL 3: " . mysql_error());
        }
        else if ($sefaz == "1")
        {
            $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = $script[$i]
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
            if (mysql_num_rows($consulta) == 1)
            {
               mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_sefaz
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = $script[$i]
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                        or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ2): " . mysql_error());
            }
            else
            {
                 mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', $script[$i], $freq_sefaz, '$empresa_idEscritorio')")
                        or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ1): " . mysql_error());
                
                
            }
        }
    }
    if ($decode == $nome[$i])
    {
        if ($sefin == "0")
        {
            //delete1
            mysql_query("DELETE FROM fila_execucao 
                                WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                                AND certidao_contratada_scripts_idScript = $script[$i]")
                    or die("ERRO NO SQL 4: " . mysql_error());

            //delete2
            mysql_query("DELETE FROM certidao_processada 
                                WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                                AND certidao_contratada_scripts_idScript = $script[$i]")
                    or die("ERRO NO SQL 5: " . mysql_error());

            //delete3
            mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                                AND scripts_idScript = $script[$i]
                                AND empresa_idEscritorio = '$empresa_idEscritorio'")
                    or die("ERRO NO SQL 6: " . mysql_error());
        }
        else if ($sefin == "1")
        {
            $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = $script[$i]
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
            if (mysql_num_rows($consulta) == 1)
            {
                mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_sefin
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = $script[$i]
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                        or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ4): " . mysql_error());
                
                }
            else
            {
                mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', $script[$i], $freq_sefin, '$empresa_idEscritorio')")
                        or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ3): " . mysql_error());
            
            }
        }
    }
}
//SEFAZ&SEFIN--FIM
//***
//CRF-INICIO
if ($crf == "0")
{
    //delete1
    mysql_query("DELETE FROM fila_execucao 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 28")
            or die("ERRO NO SQL 7: " . mysql_error());

    //delete2
    mysql_query("DELETE FROM certidao_processada 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 28")
            or die("ERRO NO SQL 8: " . mysql_error());

    //delete3
    mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 28
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
            or die("ERRO NO SQL 9: " . mysql_error());
}
else if ($crf == "1")
{
    $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = 28
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
    if (mysql_num_rows($consulta) == 1)
    {
        mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_crf
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 28
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ6): " . mysql_error());
        
        }
    else
    {
        mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 28, $freq_crf, '$empresa_idEscritorio')")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ5): " . mysql_error());
    
    }
}
//CRF--FIM
//***
//DATAPREV1--INICIO
if ($dp1 == "0")
{
    //delete1
    mysql_query("DELETE FROM fila_execucao 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 29")
            or die("ERRO NO SQL 10: " . mysql_error());

    //delete2
    mysql_query("DELETE FROM certidao_processada 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 29")
            or die("ERRO NO SQL 11: " . mysql_error());

    //delete3
    mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 29
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
            or die("ERRO NO SQL 12: " . mysql_error());
}
else if ($dp1 == "1")
{
    $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = 29
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
    if (mysql_num_rows($consulta) == 1)
    {
       mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_dp1
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 29
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ8): " . mysql_error());
    }
    else
    {
        
        
         mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 29, $freq_dp1, '$empresa_idEscritorio')")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ7): " . mysql_error());
    }
}
//DATAPREV1--FIM
//***
//SRF_PGFN--INICIO
if ($srf == "0")
{
    //delete1
    mysql_query("DELETE FROM fila_execucao 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 55")
            or die("ERRO NO SQL 13: " . mysql_error());

    //delete2
    mysql_query("DELETE FROM certidao_processada 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 55")
            or die("ERRO NO SQL 14: " . mysql_error());

    //delete3
    mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 55
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
            or die("ERRO NO SQL 15: " . mysql_error());
}
else if ($srf == "1")
{
    $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = 55
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
    if (mysql_num_rows($consulta) == 1)
    {
        
         mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_srf
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 55
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ10): " . mysql_error());
    }
    else
    {
       mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 55, $freq_srf, '$empresa_idEscritorio')")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ9): " . mysql_error());
    }
}
//SRF_PGFN--FIM
//***
//DATAPREV3--INICIO
if ($dp3 == "0")
{
    //delete1
    mysql_query("DELETE FROM fila_execucao 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 68")
            or die("ERRO NO SQL 16: " . mysql_error());

    //delete2
    mysql_query("DELETE FROM certidao_processada 
                        WHERE certidao_contratada_cnpj_idCnpj = '$idCnpj'
                        AND certidao_contratada_scripts_idScript = 68")
            or die("ERRO NO SQL 17: " . mysql_error());

    //delete3
    mysql_query("DELETE FROM certidao_contratada WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 68
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
            or die("ERRO NO SQL 18: " . mysql_error());
}
else if ($dp3 == "1")
{
    $consulta = mysql_query("SELECT cnpj_idCnpj, scripts_idScript, empresa_idEscritorio
                            FROM certidao_contratada
                            WHERE cnpj_idCnpj = '$idCnpj'
                            AND scripts_idScript = 68
                            AND empresa_idEscritorio = '$empresa_idEscritorio'");
    if (mysql_num_rows($consulta) == 1)
    {
       
        mysql_query("UPDATE certidao_contratada SET periodicidade = $freq_dp3
                        WHERE cnpj_idCnpj = '$idCnpj'
                        AND scripts_idScript = 68
                        AND empresa_idEscritorio = '$empresa_idEscritorio'")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ12): " . mysql_error());
    }
    else
    {
         mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                    scripts_idScript, periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 68, $freq_dp3, '$empresa_idEscritorio')")
                or die("ERRO NO SQL (INSERT-UPDATE-SEFAZ11): " . mysql_error());
    }
}
//DATAPREV3--FIM
?>