<?php

    error_reporting(E_ALL ^ E_NOTICE);

    include ("../config.php");

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

    $_UP['pasta'] = 'arquivos/';

    $_UP['tamanho'] = 1024 * 1024 * 8; // 8Mb

    if ($_FILES['arquivo']['error'] != 0)
    {
        die("Nao foi possÌvel fazer o upload do arquivo. Tente Novamente!<br />");
        exit; // Para a execu√ß√£o do script
    }

    if ($_UP['tamanho'] < $_FILES['arquivo']['size'])
    {
        echo ("<div style='padding:10px; border:1px solid #0F0; background:#EAFFD5; font:16px Tahoma, Geneva, sans-serif;' align='center'><b>O arquivo enviado &eacute; muito grande, envie arquivos de at&eacute; 8Mb.<br />Para envio de arquivos maiores, contactar o Administrador do Site.</b></div>");
    }

    $nome_final = $_FILES['arquivo']['name'];

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final))
    {
        $filename = ("arquivos/" . $nome_final);
        $row = 0;
        $handle = fopen($filename, "r");
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
        {
            $num = count($data);
            //echo "<p> $num campos na linha $row: <br /></p>\n";
            $row++;

            for ($c = 0; $c < $num; $c++)
            {
                //$data[$c];
                //echo ("Linha $row <br />\n");
                //echo ("Campo $c: " . $data[$c] . "<br />\n");
                //CNPJ
                $idCnpj = $data[0];
                $razao_social = $data[1];
                $UF = $data[2];
                $cidade = $data[3];
                //INSCRICAO ESTADUAL
                if ($data[5] == null)
                {
                    $inscricao_estadual = "";
                }
                else
                {
                    $inscricao_estadual = $data[5];
                }
                //CPF SEFAZ MG
                if ($data[6] == null)
                {
                    $cpf_mg = "";
                }
                else
                {
                    $cpf_mg = $data[6];
                }
                //SENHA SEFAZ MG
                if ($data[7] == null)
                {
                    $senha_mg = "";
                }
                else
                {
                    $senha_mg = $data[7];
                }
                //INSCRICAO MUNICIPAL
                if ($data[9] == null)
                {
                    $inscricao_municipal = "";
                }
                else
                {
                    $inscricao_municipal = $data[9];
                }
                //SENHA DATAPREV1
                if ($data[11] == null)
                {
                    $senha_rf = "";
                }
                else
                {
                    $senha_rf = $data[11];
                }
                //E-MAIL1
                if ($data[15] == null)
                {
                    $email = "";
                }
                else
                {
                    $email = $data[15];
                }
                //E-MAIL2
                if ($data[16] == null)
                {
                    $email2 = "";
                }
                else
                {
                    $email2 = $data[16];
                }
                //E-MAIL3
                if ($data[17] == null)
                {
                    $email3 = "";
                }
                else
                {
                    $email3 = $data[17];
                }

                //CNPJ_EMPRESA
                $empresa_idEscritorio = $_POST['escritorio'];
                $cnpj_idCnpj = $idCnpj;
                $usuario_login = $_POST['usuario'];

                //CERTIDAO_CONTRATADA
                $dataHora = date("Y-m-d H:i:s");

                if ($data[4] == "x" || $data[4] == "X")
                {
                    $sefaz = "1";
                }
                else if ($data[4] == null)
                {
                    $sefaz = "0";
                }
                ///*********
                if ($data[8] == "x" || $data[8] == "X")
                {
                    $sefin = "1";
                }
                else if ($data[8] == null)
                {
                    $sefin = "0";
                }
                ///*********
                if ($data[10] == "x" || $data[10] == "X")
                {
                    $dp1 = "1";
                }
                else if ($data[10] == null)
                {
                    $dp1 = "0";
                }
                ///*********
                if ($data[12] == "x" || $data[12] == "X")
                {
                    $crf = "1";
                }
                else if ($data[12] == null)
                {
                    $crf = "0";
                }
                ///*********
                if ($data[13] == "x" || $data[13] == "X")
                {
                    $srf = "1";
                }
                else if ($data[13] == null)
                {
                    $srf = "0";
                }
                ///*********
                if ($data[14] == "x" || $data[14] == "X")
                {
                    $dp3 = "1";
                }
                else if ($data[14] == null)
                {
                    $dp3 = "0";
                }
            }

            $consulta = mysql_query("SELECT idCnpj FROM cnpj WHERE idCnpj = '$idCnpj'") or die("ERRO NO SQL: 1" . mysql_error());
            $consulta2 = mysql_query("SELECT cnpj_idCnpj FROM cnpj_empresa WHERE cnpj_idCnpj = '$idCnpj'
                        AND empresa_idEscritorio = '$empresa_idEscritorio'") or die("ERRO NO SQL: 1" . mysql_error());

            if (mysql_num_rows($consulta) == 1)
            {
                if (mysql_num_rows($consulta2) >= 1)
                {
                    //nada
                }
                else
                {
                    //create2
                    mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj,
                    usuario_login, email)
                    VALUES ('$empresa_idEscritorio', '$cnpj_idCnpj', '$usuario_login', '$email')") 
                    or die("ERRO NO SQL: 2" . mysql_error());
                }
            }
            else
            {
                //create1
                mysql_query("INSERT INTO cnpj (idCnpj, razao_social,
                    inscricao_estadual, inscricao_municipal, UF, cidade, cpf, senha,
                    senha_rf, email2, email3)
                    VALUES ('$idCnpj', '$razao_social', '$inscricao_estadual',
                    '$inscricao_municipal', '$UF', '$cidade', '$cpf_mg',
                    '$senha_mg', '$senha_rf', '$email2', '$email3')") or die("ERRO NO SQL: 1" . mysql_error());

                if (mysql_num_rows($consulta2) >= 1)
                {
                    //nada
                }
                else
                {
                    //create2
                    mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj,
                    usuario_login, email)
                    VALUES ('$empresa_idEscritorio', '$cnpj_idCnpj', '$usuario_login', '$email')") 
                    or die("ERRO NO SQL: 2" . mysql_error());
                }
            }
            //**************************
            for ($i = 0; $i < 26; $i++)
            {
                if ($UF == $bot[$i])
                {
                    if ($sefaz == "1")
                    {
                        $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = $scripts_idScript[$i]") or die("1ERRO NO SQL: " . mysql_error());

                        if (mysql_num_rows($consulta) >= 1)
                        {
                            //echo ("J· Existe SEFAZ");
                        }
                        else
                        {
                            //create3
                            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                            scripts_idScript, periodicidade, empresa_idEscritorio)
                            VALUES ('$idCnpj', $scripts_idScript[$i], 30,
                            '$empresa_idEscritorio')") or die("ERRO NO SQL: 3" . mysql_error());

                            //create4
                            mysql_query("INSERT INTO fila_execucao (idFila, dataHora,
                            prioridade, status, certidao_contratada_cnpj_idCnpj,
                            certidao_contratada_scripts_idScript)
                            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj',
                            $scripts_idScript[$i])") or die("ERRO NO SQL: 4" . mysql_error());
                        }
                    }
                }
                if ($cidade == $bot[$i])
                {
                    if ($sefin == "1")
                    {
                        $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = $scripts_idScript[$i]") or die("2ERRO NO SQL: " . mysql_error());

                        if (mysql_num_rows($consulta) >= 1)
                        {
                            //echo ("J· Existe SEFIN");
                        }
                        else
                        {
                            //create3
                            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj,
                            scripts_idScript, periodicidade, empresa_idEscritorio)
                            VALUES ('$idCnpj', $scripts_idScript[$i], 30,
                            '$empresa_idEscritorio')") or die("ERRO NO SQL: 5" . mysql_error());

                            //create4
                            mysql_query("INSERT INTO fila_execucao (idFila, dataHora,
                            prioridade, status, certidao_contratada_cnpj_idCnpj,
                            certidao_contratada_scripts_idScript)
                            VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj',
                            $scripts_idScript[$i])") or die("ERRO NO SQL: 6" . mysql_error());
                        }
                    }
                }
            }

            if ($dp1 == "1")
            {
                $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = 29") or die("3ERRO NO SQL: " . mysql_error());

                if (mysql_num_rows($consulta) >= 1)
                {
                    //echo ("J· Existe DP1");
                }
                else
                {
                    //create3
                    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
                    periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 29, 30, '$empresa_idEscritorio')") or die("ERRO NO SQL: " . mysql_error());
                    //create4
                    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, status,
                    certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript)
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 29)") or die("ERRO NO SQL: 7" . mysql_error());
                }
            }

            if ($crf == "1")
            {
                $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = 28") or die("4ERRO NO SQL: " . mysql_error());

                if (mysql_num_rows($consulta) >= 1)
                {
                    //echo ("J· Existe CRF");
                }
                else
                {
                    //create3
                    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
                    periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 28, 30, '$empresa_idEscritorio')") or die("ERRO NO SQL: 8" . mysql_error());

                    //create4
                    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                    status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript)
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 28)") or die("ERRO NO SQL: 9" . mysql_error());
                }
            }

            if ($srf == "1")
            {
                $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = 55") or die("5ERRO NO SQL: " . mysql_error());

                if (mysql_num_rows($consulta) >= 1)
                {
                    //echo ("J· Existe SRF");
                }
                else
                {
                    //create3
                    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
                    periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 55, 30, '$empresa_idEscritorio')") or die("ERRO NO SQL: 10" . mysql_error());

                    //create4
                    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                    status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript)
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 55)") or die("ERRO NO SQL: 11" . mysql_error());
                }
            }

            if ($dp3 == "1")
            {
                $consulta = mysql_query("SELECT * FROM certidao_contratada 
                            WHERE cnpj_idCnpj = '$idCnpj' 
                                AND empresa_idEscritorio = '$empresa_idEscritorio'
                                AND scripts_idScript = 68") or die("6ERRO NO SQL: " . mysql_error());

                if (mysql_num_rows($consulta) >= 1)
                {
                    //echo ("J· Existe DP3");
                }
                else
                {
                    //create3
                    mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, scripts_idScript,
                    periodicidade, empresa_idEscritorio)
                    VALUES ('$idCnpj', 68, 30, '$empresa_idEscritorio')") or die("ERRO NO SQL: 12" . mysql_error());

                    //create4
                    mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                    status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript)
                    VALUES (null, '$dataHora', 0, 'pendente', '$idCnpj', 68)") or die("ERRO NO SQL: 13" . mysql_error());
                }
            }
        }
        fclose($handle);

        echo ("<div style='padding:10px; border:1px solid #0F0; background:#EAFFD5; font:16px Tahoma, Geneva, sans-serif;' align='center'><b>Importa&ccedil;&atilde;o efetuada com Sucesso!</b></div>");
    }
    else
    {
        echo ("<div style='padding:10px; border:1px solid #0F0; background:#EAFFD5; font:16px Tahoma, Geneva, sans-serif;' align='center'><b>N&atilde;o foi poss&iacute;vel enviar o arquivo, tente novamente.</b></div>");
    }
?>