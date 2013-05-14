<?php
include("idCaptcha.php");
include_once("verifica.php");
//UPDATE DO TIMEOUT
date_default_timezone_set('America/Sao_Paulo');
$dt_update = date('Y-m-d H:i:s');
$updtimeout = mysql_query("UPDATE operador_captcha SET timeout_session = '$dt_update', status = 1 WHERE login = '".$_COOKIE["login_cookie"]."'"); 
?>


<!DOCTYPE html>
<html>
    <head>
        <?php echo($html);?> 
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link rel="stylesheet" type="text/css" href="css/style_pag.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
        <script type="text/javascript" src="js/desabilita.js"></script>
        <script>            
            function redireciona()
            {
                window.location.href ='naoentendi.php';
            }
        </script>        
        
    </head>

    <body onunload="<?php session_start();?>"> 

           


        <div id="content"><!-----------CONTENT------------>

            <div id="conteudo"><!---CONTEÚDO--->
                <div id="titulo">          
                    <table>
                        <tr>
                            <td><img src="img/marcador.png" /></td>
                            <td><h4><?php echo($nomeScript) ?></h4></td>
                        </tr>
                    </table>
                </div>


                <div class="bgw" align="right">
                    <form action="destroy.php" method="post"> Seja Bem-vindo, <?php echo $_SESSION['nome']; ?>.&nbsp;<input name="submit" type="submit" value="SAIR" class="botao">

                        <input type="hidden" name="logindestroy" value="<?php echo $_SESSION['login'] ?>">
                        <input type="hidden" name="idCaptchadestroy" value="<?php echo $idCaptcha ?>">

                    </form>
                   
                 </div>
                <div id="captcha">
                    <form action="envia-captcha.php" method="post">
                        <input type="hidden" name="login" value="<?php echo $_SESSION['login'] ?>">
                        <input type="hidden" name="idCaptcha" value="<?php echo $idCaptcha ?>">
                        <input type="hidden" name="task_id" value="<?php echo $task_id ?>">
                        <input type="hidden" name="scripts_idScript" value="<?php echo $scripts_idScript ?>">

                        <br clear="all" /><br />
                        <p><?php echo ($numero_fila) ?></p>
                        <iframe style="padding-left:60px;" src="mostrafoto.php" name="interna" frameborder="0" width="600" height="480"></iframe>
                        <p><input name="texto" type="text" maxlength="10" /></p>

                        <br clear="all" /><br />
                        <p>
                            <input name="submit" type="submit" value="Enviar" class="botao">&nbsp;&nbsp;&nbsp;
                            <input name="submit2" type="button" value="Não Entendi" class="botao" onclick="redireciona()">
                        </p>

                    </form>
                  
                </div>
            </div>
        </div>

    </body>
</html>