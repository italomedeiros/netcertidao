<?php

    include("config.php");

    $login = $_GET['login'];
    $senha = $_GET['senha'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];

    $assunto = "Recuperação de Senha - NETCERTIDÃO";
    $mensagemHTML = "<p>
                        Foi feita uma solicita&ccedil;&atilde;o de 
                        recupera&ccedil;&atilde;o de senha do 
                        Sistema NET CERTID&Atilde;O.
                    </p>
                    <p>Sua Senha é: " . $senha . "</p>
                    <p>
                        Clique no link abaixo para se autenticar no 
                        Sistema NET CERTID&Atilde;O:
                    </p>
                    <p><a href='http://acft.ws/ptpx'>http://acft.ws/ptpx</a></p>
                    <p>
                        Para sua seguran&ccedil;a, após efetuar a autenticação no 
                        Sistema NET CERTID&Atilde;O, recomendamos que modifique sua senha.
                    </p>
                    <p>Nome de Usu&aacute;rio: " . $login . "</p>
                    <p>Nome: " . $nome . "</p>
                    <p>E-mail: " . $email . "</p>
                    <p>
                        Se voc&ecirc; n&atilde;o fez esta solicita&ccedil;&atilde;o,
                        favor desconsiderar esta mensagem.
                    </p>
                    <p>
                        Esta mensagem de e-mail foi gerada automaticamente. 
                        Favor n&atilde;o respond&ecirc;-la.
                    </p>";

    $emailsender = "locaweb@www370.locaweb.com.br";

    //cabeçalho da mensagem
    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $emailsender\n";
    $headers .= "Reply-To: noreply@netcertidao.com.br\n";
    $headers .= "Reply-path: noreply@netcertidao.com.br\n";

    //enviando a mensagem
    $enviar = mail($email, $assunto, $mensagemHTML, $headers)
            or die("ERRO NO SQL: " . mysql_error());

    if ($enviar == true)
    {
        echo ("sucesso!");
    }
?>