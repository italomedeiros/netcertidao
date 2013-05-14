<?php
    include ("config.php");

    function deleteUsuario()
    {
        $login = $_GET['login'];
        $delete = mysql_query("DELETE FROM usuario WHERE login = '$login'") or die("ERRO NO SQL: " . mysql_error());

        if ($delete)
        {
            echo ("Delete-Usuario sucesso!");
        }
        else
        {
            echo ("Delete-Usuario erro!");
        }
    }
?>