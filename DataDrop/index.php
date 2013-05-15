<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />

    </head>
    <body>
        <p style="font-weight: bold; line-height: 150%;">
            <span style="font-size: 20px; font-style: "><u>Instruções:</u></span><br />
            Passo 1: Crie um documento de Excel preenchidas com as informações <br />
            Passo 1.1: Não é necessário o preenchimento do cabeçalho (1ª linha), 
            preencha somente as informações referentes ao CNPJ. <br />
            Respeite o preenchimento das informações que são obrigatórias 
            (a descrição sobre quais dados são obrigatórios estão listadas 
            abaixo da opção Baixar Template!). <br />
            Passo 1.2: É importante que seja respeitado os posicionamentos de cada 
            informação (coluna), conforme o template abaixo. <br />
            Passo 2: Salve o arquivo como tipo "CSV", por exemplo: "importacao.csv".<br />
            Passo 3: Faça o upload do arquivo salvo conforme o passo 2, 
            através do botão Escolher arquivo e em seguida clique em Enviar.
        </p>

        <table width="100%" border="1" cellspacing="1">
            <tr>
                <th>CNPJ(*)</th>
                <th>Razão Social(*)</th>
                <th>UF(*)</th>
                <th>Cidade(*)</th>
                <th>SEFAZ</th>
                <th>Inscrição Estadual(1)</th>
                <th>CPF(2)</th>
                <th>Senha(2)</th>
                <th>SEFIN</th>
                <th>Inscrição Municipal(3)</th>
                <th>Consulta Prev</th>
                <th>Senha_Consulta Prev.(4)</th>
                <th>CRF</th>
                <th>SRF/PGFN</th>
                <th>DATAPREV3</th>
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
                <td>email2@dominio.com</td>
                <td>email3@dominio.com</td>
            </tr>
        </table>
        
        <p>
            <button type="button" onclick="window.location = 'template.xls';">Baixar Template!</button>
        </p>
        
        <p style="font-weight: bold; line-height: 150%;">
            Descrição dos campos obrigatórios:<br />
            (*) Dados obrigatórios.<br />
            (1) Campo Inscrição Estadual, torna-se obrigatório para a emissão 
            das certidões SEFAZ MA e SEFAZ MG.<br />
            (2) Campos CPF e Senha, tornam-se obrigatórios para a emissão 
            da certidão SEFAZ MG.<br />
            Para efetuar esta consulta é necessário CPF do sócio master e senha. 
            A senha pode ser obtida em uma Unidade de Atendimento da 
            Secretaria da Fazenda do Estado de Minas Gerais.<br />
            (3) Campo Inscrição Municipal, torna-se obrigatório para a emissão 
            da certidão SEFIN Belo Horizonte e SEFIN Recife.<br />
            (4) Campo Senha_Consulta Prev., torna-se obrigatório para a emissão 
            da certidão Consulta Regularidade Contribuições Previdenciária (Consulta Prev.).<br />
            Para efetuar esta consulta é necessário senha. 
            A senha pode ser obtida em uma Unidade de Atendimento da Receita Federal do Brasil.<br />
            <span style='color: red'>Obs.: Utilizar o caractere "x" para indicar o tipo de certidão escolhida (sem as aspas).</span>
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
