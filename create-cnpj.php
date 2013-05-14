<?php

include("config.php");

$scripts_idScript = array();
$scripts_idScript[0] = 28; //CRF

$scripts_idScript[1] = 68; //DataPrev3
$scripts_idScript[2] = 55; //SRF-PGFN
$scripts_idScript[3] = 49; //MA
$scripts_idScript[4] = 58; //SP
$scripts_idScript[5] = 60; //PortoAlegre
$scripts_idScript[6] = 61; //BeloHorizonte
$scripts_idScript[7] = 62; //Recife
$scripts_idScript[8] = 63; //RN
$scripts_idScript[9] = 67; //PR

$scripts_idScript[10] = 29; //DataPrev1

$scripts_idScript[11] = 20; //ES
$scripts_idScript[12] = 21; //PE
$scripts_idScript[13] = 23; //DF
$scripts_idScript[14] = 24; //CE
$scripts_idScript[15] = 25; //GO
$scripts_idScript[16] = 26; //TO
$scripts_idScript[17] = 27; //MG
$scripts_idScript[18] = 31; //Vitoria
$scripts_idScript[19] = 32; //Natal
$scripts_idScript[20] = 33; //Florianopolis
$scripts_idScript[21] = 43; //AL
$scripts_idScript[22] = 45; //Salvador
$scripts_idScript[23] = 47; //Palmas
$scripts_idScript[24] = 56; //Fortaleza
$scripts_idScript[25] = 66; //Caucaia

$bot = array();
$bot[0] = "CRF";

$bot[1] = "DataPrev3";
$bot[2] = "SRF-PGFN";
$bot[3] = "MA";
$bot[4] = "SP";
$bot[5] = "Porto Alegre";
$bot[6] = "Belo Horizonte";
$bot[7] = "Recife";
$bot[8] = "RN";
$bot[9] = "PR";

$bot[10] = "DataPrev1";

$bot[11] = "ES";
$bot[12] = "PE";
$bot[13] = "DF";
$bot[14] = "CE";
$bot[15] = "GO";
$bot[16] = "TO";
$bot[17] = "MG";
$bot[18] = "Vitoria";
$bot[19] = "Natal";
$bot[20] = "Florianopolis";
$bot[21] = "AL";
$bot[22] = "Salvador";
$bot[23] = "Palmas";
$bot[24] = "Fortaleza";
$bot[25] = "Caucaia";


//CNPJ
$idCnpj = $_GET['cnpj'];
$razao_social = $_GET['rs'];
$inscricao_estadual = $_GET['ie'];
$inscricao_municipal = $_GET['im'];
$UF = $_GET['uf'];
$cidade = $_GET['cid'];
$cpf_mg = $_GET['cpf'];
$senha_mg = $_GET['sen'];
$senha_rf = $_GET['sen2'];
$email2 = $_GET['em2'];
$email3 = $_GET['em3'];

$sefaz = $_GET['faz'];
$sefin = $_GET['fin'];

$dp3 = $_GET['dp3'];
$crf = $_GET['crf'];
$srf = $_GET['srf'];

//CNPJ_EMPRESA
$empresa_idEscritorio = $_GET['emp'];
$cnpj_idCnpj = $idCnpj;
$usuario_login = $_GET['usu'];
$email = $_GET['em1'];

//CERTIDAO_CONTRATADA
$freq_sefaz = $_GET['pfaz'];
$freq_sefin = $_GET['pfin'];
$freq_crf = $_GET['pcrf'];
$freq_dp3 = $_GET['pdp3'];
$freq_srf = $_GET['psrf'];
$freq_dp1 = $_GET['pdp1'];

$dataHora = date("Y-m-d H:i:s");
$decode = rawurldecode($cidade);
//echo ($decode);
$consulta = mysql_query("SELECT idCnpj FROM cnpj WHERE idCnpj = '$idCnpj'")
        or die("ERRO NO SQL: 1" . mysql_error());

if (mysql_num_rows($consulta) == 1)
{
    //create2
    mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
    usuario_login, email)
    VALUES ('$empresa_idEscritorio', '$cnpj_idCnpj', '$usuario_login', '$email')")
            or die("ERRO NO SQL: 2" . mysql_error());
}
else
{
    //create1
    mysql_query("INSERT INTO cnpj (idCnpj, razao_social, 
    inscricao_estadual, inscricao_municipal, UF, cidade, cpf, senha,
    senha_rf, email2, email3)
        VALUES ('$idCnpj', '$razao_social', '$inscricao_estadual',
        '$inscricao_municipal', '$UF', '$decode', '$cpf_mg', 
        '$senha_mg', '$senha_rf', '$email2', '$email3')")
            or die("ERRO NO SQL: 1" . mysql_error());

    //create2
    mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
    usuario_login, email)
    VALUES ('$empresa_idEscritorio', '$cnpj_idCnpj', '$usuario_login', '$email')")
            or die("ERRO NO SQL: 2" . mysql_error());
}
//**************************
for ($i = 0; $i < 26; $i++)
{
    if ($UF == $bot[$i])
    {
        if ($sefaz == "1")
        {
            //create3
            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
            scripts_idScript, periodicidade, empresa_idEscritorio) 
                VALUES ('$idCnpj', $scripts_idScript[$i], $freq_sefaz, 
                '$empresa_idEscritorio')")
                or die("ERRO NO SQL: 3" . mysql_error());

            //create4
            mysql_query("INSERT INTO fila_execucao (idFila, dataHora, 
                prioridade, status, certidao_contratada_cnpj_idCnpj, 
                certidao_contratada_scripts_idScript) 
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj',
                    $scripts_idScript[$i])")
                    or die("ERRO NO SQL: 4" . mysql_error());
        }
    }
    if ($decode == $bot[$i])
    {
        if ($sefin == "1")
        {
            //create3
            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                scripts_idScript, periodicidade, empresa_idEscritorio)
                        VALUES ('$idCnpj', $scripts_idScript[$i], $freq_sefin,
                        '$empresa_idEscritorio')")
                    or die("ERRO NO SQL: 5" . mysql_error());

            //create4
            mysql_query("INSERT INTO fila_execucao (idFila, dataHora, 
                prioridade, status, certidao_contratada_cnpj_idCnpj, 
                certidao_contratada_scripts_idScript) 
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj',
                    $scripts_idScript[$i])")
                    or die("ERRO NO SQL: 6" . mysql_error());
        }
    }
}

if ($senha_rf != "")
{
    //create3
    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
        periodicidade, empresa_idEscritorio) 
            VALUES ('$idCnpj', 29, $freq_dp1, '$empresa_idEscritorio')")
            or die("ERRO NO SQL: " . mysql_error());
    //create4
    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, status,
        certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript)
            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 29)")
            or die("ERRO NO SQL: 7" . mysql_error());
}

if ($crf == "1")
{
    //create3
    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
        periodicidade, empresa_idEscritorio)
            VALUES ('$idCnpj', 28, $freq_crf, '$empresa_idEscritorio')")
            or die("ERRO NO SQL: 8" . mysql_error());

    //create4
    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, 
        status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 28)")
            or die("ERRO NO SQL: 9" . mysql_error());
}

if ($srf == "1")
{
    //create3
    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
        periodicidade, empresa_idEscritorio)
            VALUES ('$idCnpj', 55, $freq_srf, '$empresa_idEscritorio')")
            or die("ERRO NO SQL: 10" . mysql_error());

    //create4
    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, 
        status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 55)")
            or die("ERRO NO SQL: 11" . mysql_error());
}

if ($dp3 == "1")
{
    //create3
    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
        periodicidade, empresa_idEscritorio)
            VALUES ('$idCnpj', 68, $freq_dp3, '$empresa_idEscritorio')")
            or die("ERRO NO SQL: 12" . mysql_error());

    //create4
    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, 
        status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 68)")
            or die("ERRO NO SQL: 13" . mysql_error());
}
?>