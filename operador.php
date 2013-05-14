<html>
    <head>
        <script language="javascript"> 
            function OpenBrowser()
            { 
                newWindow = window.open('http://www.netcertidao.com.br/controle-captcha.php', 'Controle Captcha',
                "toolbar = no, status = no, menubar = no, location = no, resizable = yes, scrollbars = yes, top = 0, left = 0, height = 768, width = 1010, fullscreen = yes");
                newWindow.focus();
                parent.opener = top;
                window.open('','_self');
                parent.close();
            } 
        </script>
    </head>
    
    <body onLoad="OpenBrowser()">
    </body>
</html>
