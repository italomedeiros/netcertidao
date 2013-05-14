<?php

    include("config.php");
    $dataHora = date("Y-m-d H:i:s");
    $in = mysql_query("INSERT INTO fila_execucao (idFila, dataHora, prioridade, 
            status, certidao_contratada_cnpj_idCnpj, certidao_contratada_scripts_idScript) 
                VALUES (null, '$dataHora', 1, 'pendente', '20.492.641/0001-18', 28)")
            or die("ERRO NO SQL: " . mysql_error());

    if ($in)
    {
        echo ("sucesso!");
    }
?>
