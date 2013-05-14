
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv='refresh' content='1;URL=http://201.49.20.148:8887/login.php' />
        <link rel="stylesheet" type="text/css" href="css/style_.css" />
        <link rel="stylesheet" type="text/css" href="css/style2_.css" />
        <?php
        
        ?>
    </head>

    <body>
        <div id="content"><!-----------CONTENT------------>

            <div id="conteudo"><!---CONTEÚDO--->
                <div id="titulo">          
                                 
                </div>
            
                <div id="tudo_login">
        <div id="content_login">
            <div class="bgw" align="left">Login de Usuário - CAPTCHAS</div>
            <br />
            <form action="auth.php" method="post">
                <label for="login"><b>Login:</b></label>
                <input type="text" name="login" size="20" class="border" maxlength="20" required /><br clear="all"/><br />

                <label for="senha"><b>Senha:</b></label>
                <input type="password" name="senha" size="20" class="border" maxlength="20" required /><br />

                <a href="recuperar.php">(esqueci minha senha)</a><br clear="all" /><br />
                <!--
                <label for="captcha">
                    <img src="captcha/captcha.php" alt="security" /><br />
                    <b>Digite o código:</b>
                </label>
                <input type="text" name="captcha" size="5" class="border" maxlength="5" id="captcha" required /><br clear="all" /><br />
                -->    
                <input type="submit" name="entrar" class="input1" value="Entrar" />                
            </form>
            <br />
        </div>
    </div>
            </div>
            
        </div>
    </body>
</html>