<?php
    include("idCaptcha.php");

    
    
    $sql = mysql_query("SELECT imagem FROM fila_captcha WHERE idCaptcha = $idCaptcha");
    $linha = mysql_fetch_array($sql);
    $foto = $linha["imagem"];

    if (mysql_num_rows($sql) == 1)
    {
        

        header("content-type: image/jpeg");
        echo $foto;
        flush(); //limpa o buffer
    }else{
        
        
        $foto = "";
        echo $foto;
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

        <link rel="stylesheet" type="text/css" href="css/style_pag.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />

        <script type="text/javascript" src="js/desabilita.js"></script>
    </head>
    <body>
        <?php
        if (mysql_num_rows($sql) == 1)
        {        
        echo("<p><img src='mostrafoto.php?codigo=$idCaptcha' width='50' height='50' /></p>");
        }else{
        echo("<p><img src='http://www.netcertidao.com.br/img/logo.png' width='400' height='300' /></p>");
        }
        ?>
    </body>
</html>