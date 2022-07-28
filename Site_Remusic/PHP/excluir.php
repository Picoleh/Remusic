<HTML>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/adicionado.css">
    <link rel="icon" type="imagem/png" href="../img/Icon.png" />
    <script>
        function funcao1(){
alert("Registro Excluido com sucesso!");
}

function funcao2(){
alert("Registro NÃO Excluido!");
}
function voltar() {
    window.location.href = '../HTML/pesquisa.html';
}
    </script>
	</head>
<BODY>
<?php
$id=		$_GET["id"];
$bd=mysqli_connect("localhost","root","","remusic") or die ("erro!");
//mysql_select_db("detran");

$excluiu=mysqli_query($bd,"delete from musicas where id_musica = '$id'");

if ($excluiu == 1)
{
	?> <script language="javascript" type="text/javascript"> funcao1();</script>
  
  <?php
}
	else
	{
	?> <script language="javascript" type="text/javascript"> funcao2();</script>

   <?php
	}

?><script language="javascript" type="text/javascript"> voltar();</script>
</body>
</html>