<?php
$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['comments'];

$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$arquivo = "
<style type='text/css'>
body{
margin:0px;
font-family:Verdane;
font-size:12px;
color:#666666;
}
a{
color:#666666;
text-decoration:none;
}
a:hover{
color:#FF0000;
text-decoration:none;
}
</style>
<html>
    <table width='510'border='1'cellpadding='1'bgcolor='#CCCCCC'>
        <tr>
            <td>
                <tr>
                    <td width='500'>Nome:$nome</td>
                </tr>
                <tr>
                    <td width='320'>Email:<b>$email</b></td>
                </tr>
                <tr>
                    <td width='320'>Mensagem:<b>$mensagem</b></td>
                </tr>
            </td>
        </tr>
        <tr>
        <td>Este email foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
    </table>
</html>
";

$emailenviar="jedersonridriigues@outlook.com";
$destino = $emailenviar;
$assunto = "Contato pelo site";
$headers = 'MIME-Version:2.0'."\r\n";
$headers.= 'Content-type:text/html;charset=iso-8859-1'."\r\n";
$headers.= 'From:$nome<$email>';
$enviaremail = mail($destino,$assunto,$arquivo,$headers);
if($enviaremail){
    $mgm = "Email Enviado com Sucesso!<br>O link será enviado para o email fornecido no formulario";
    echo "<meta http-equiv='refresh'content='10;URL=index.php'>";
}else{
    $mgm = "Erro ao enviar email !";
    echo "";
}
?>