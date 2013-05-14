<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />

    </head>
    <body>
        <p style="font-weight: bold; line-height: 150%;">
            <span style="font-size: 20px; font-style: "><u>Instru��es:</u></span><br />
            1. Crie um documento de excel, com as informa��es do CNPJ de acordo
            com o formato abaixo. <br />
            N�o � necess�rio o preenchimento do cabe�alho,
            preencha somente as informa��es do CNPJ respeitando as restri��es
            descritas logo abaixo da tabela de demonstra��o.<br />
            2. Salve o arquivo como tipo "CSV", por exemplo: "importacao-cnpj.csv".<br />
            3. Utilize a ferramenta a seguir para realizar o upload do arquivo,
            e em seguida clique em "Enviar".
        </p>
        
        <table width="100%" border="1" cellspacing="1">
            <tr>
                <th>CNPJ(*)</th>
                <th>Raz�o Social(*)</th>
                <th>UF(*)</th>
                <th>Cidade(*)</th>
                <th>SEFAZ</th>
                <th>Inscri��o Estadual(1)</th>
                <th>CPF(2)</th>
                <th>Senha(2)</th>
                <th>SEFIN</th>
                <th>Inscri��o Municipal(3)</th>
                <th>DATAPREV1</th>
                <th>Senha DATAPREV1(4)</th>
                <th>CRF</th>
                <th>SRF/PGFN</th>
                <th>DATAPREV3</th>
                <th>E-mail 1</th>
                <th>E-mail 2</th>
                <th>E-mail 3</th>
            </tr>
            <tr>
                <td>00.000.000/0000-00</td>
                <td>Importando CNPJ LTDA</td>
                <td>CE</td>
                <td>Fortaleza</td>
                <td>x</td>
                <td>012345678</td>
                <td>000.000.000-00</td>
                <td>123</td>
                <td>x</td>
                <td>012345678</td>
                <td>x</td>
                <td>01235</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>email1@dominio.com</td>
                <td>email2@dominio.com</td>
                <td>email3@dominio.com</td>
            </tr>
        </table>
        
        <p style="font-weight: bold; line-height: 150%;">
            (*) Dados obrigat�rios.<br />
            (1) Campo Inscri��o Estadual, torna-se obrigat�rio para a emiss�o das certid�es 
            SEFAZ MA e SEFAZ MG.<br />
            (2) Campos CPF e Senha, tornam-se obrigat�rios para a emiss�o da certid�o 
            CND SEFAZ MG.<br /> 
            Para efetuar esta consulta � necess�rio CPF do s�cio master e senha. 
            A senha pode ser obtida em uma Unidade de Atendimento da Secretaria 
            da Fazenda do Estado de Minas Gerais.<br />
            (3) Campo Inscri��o Municipal, torna-se obrigat�rio para a emiss�o da certid�o 
            SEFIN Belo Horizonte e SEFIN Recife.<br />
            (4) Campo Senha DATAPREV1, torna-se obrigat�rio para a emiss�o da certid�o 
            Consulta Regularidade Contribui��es Previdenci�ria.<br />
            Para efetuar esta consulta � necess�rio senha. A senha pode ser 
            obtida em uma Unidade de Atendimento da Receita Federal do Brasil.<br />
            Obs.: Utilizar o caractere "x" para indicar o tipo de certid�o 
            escolhida (sem as aspas).
        </p>
        
        <form action="save-file.php" method="post" enctype="multipart/form-data">
            <input name="escritorio" type="hidden" value="<?php echo ($_GET['emp']); ?>" />
            <input name="usuario" type="hidden" value="<?php echo ($_GET['usu']); ?>" />
            <p>
                <input name="arquivo" type="file" class="border" size="30" />&nbsp;&nbsp;&nbsp;
                <input name="enviar" type="submit" class="input1" value="Enviar" />
            </p>
        </form>
    </body>
</html>
