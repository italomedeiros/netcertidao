<?php

    include("config.php");

    $script = array();
    $cnpj = array();

    $script[0] = 28; //CRF
    $script[1] = 55; //SRF-PGFN
    $script[2] = 68; //DATAPREV3

    $cnpj[0] = $_GET['cnpj1'];

    $email = $_GET['email'];

    $empresa = "1";
    $razao_social = "TesteGratis";
    $periodicidade = 15;
    $dataHora = date("Y-m-d H:i:s");

    $consulta = mysql_query("SELECT idCnpj FROM cnpj WHERE idCnpj = '$cnpj[0]'")
            or die("ERRO NO SQL: 1" . mysql_error());

    if (mysql_num_rows($consulta) == 1)
    {
        //create2
        mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[0]', '$email')")
                or die("ERRO NO SQL 2: " . mysql_error());
    }
    else
    {
        //create1
        mysql_query("INSERT INTO cnpj (idCnpj, razao_social)
                VALUES ('$cnpj[0]', '$razao_social')")
                or die("ERRO NO SQL 1: " . mysql_error());

        //create2
        mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[0]', '$email')")
                or die("ERRO NO SQL 2: " . mysql_error());
    }

    for ($i = 0; $i < 3; $i++)
    {
        //create3
        mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, 
                scripts_idScript, periodicidade, empresa_idEscritorio) 
                    VALUES ('$cnpj[0]', $script[$i], $periodicidade, '$empresa')")
                or die("ERRO NO SQL 3: " . mysql_error());

        //create4
        mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
                    VALUES (null, '$dataHora', 1, 'pendente', '$cnpj[0]', $script[$i])")
                or die("ERRO NO SQL 4: " . mysql_error());
    }
    //*********
    if ($_GET['cnpj2'] != "")
    {
        $cnpj[1] = $_GET['cnpj2'];

        $consulta = mysql_query("SELECT idCnpj FROM cnpj WHERE idCnpj = '$cnpj[1]'")
                or die("ERRO NO SQL: 1" . mysql_error());

        if (mysql_num_rows($consulta) == 1)
        {
            //create2
            mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[1]', '$email')")
                    or die("ERRO NO SQL 2: " . mysql_error());
        }
        else
        {
            //create1
            mysql_query("INSERT INTO cnpj (idCnpj, razao_social)
                VALUES ('$cnpj[1]', '$razao_social')")
                    or die("ERRO NO SQL 1: " . mysql_error());

            //create2
            mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[1]', '$email')")
                    or die("ERRO NO SQL 2: " . mysql_error());
        }

        for ($i = 0; $i < 3; $i++)
        {
            //create3
            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, 
                scripts_idScript, periodicidade, empresa_idEscritorio) 
                    VALUES ('$cnpj[1]', $script[$i], $periodicidade, '$empresa')")
                    or die("ERRO NO SQL 3: " . mysql_error());

            //create4
            mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
                    VALUES (null, '$dataHora', 1, 'pendente', '$cnpj[1]', $script[$i])")
                    or die("ERRO NO SQL 4: " . mysql_error());
        }
    }
    //*********
    if ($_GET['cnpj3'] != "")
    {
        $cnpj[2] = $_GET['cnpj3'];

        $consulta = mysql_query("SELECT idCnpj FROM cnpj WHERE idCnpj = '$cnpj[2]'")
                or die("ERRO NO SQL: 1" . mysql_error());

        if (mysql_num_rows($consulta) == 1)
        {
            //create2
            mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[2]', '$email')")
                    or die("ERRO NO SQL 2: " . mysql_error());
        }
        else
        {
            //create1
            mysql_query("INSERT INTO cnpj (idCnpj, razao_social)
                VALUES ('$cnpj[2]', '$razao_social')")
                    or die("ERRO NO SQL 1: " . mysql_error());

            //create2
            mysql_query("INSERT INTO cnpj_empresa (empresa_idEscritorio, cnpj_idCnpj, 
                    email)
                    VALUES ('$empresa', '$cnpj[2]', '$email')")
                    or die("ERRO NO SQL 2: " . mysql_error());
        }

        for ($i = 0; $i < 3; $i++)
        {
            //create3
            mysql_query("INSERT INTO certidao_contratada (cnpj_idCnpj, 
                scripts_idScript, periodicidade, empresa_idEscritorio) 
                    VALUES ('$cnpj[2]', $script[$i], $periodicidade, '$empresa')")
                    or die("ERRO NO SQL 3: " . mysql_error());

            //create4
            mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade,
                status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
                    VALUES (null, '$dataHora', 1, 'pendente', '$cnpj[2]', $script[$i])")
                    or die("ERRO NO SQL 4: " . mysql_error());
        }
    }
?>