<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script >
function funcao1(){
alert("Registro alterado com sucesso!");
}

function funcao2(){
alert("Registro NÃO alterado!");
}
function voltar() {
    window.location.href = '../HTML/pesquisa.html';
}
</script>
</head>
<body>

<?php
$id=			$_POST["id"];
$nome_musica=	$_POST["nome_musica"];
$autor= 		$_POST["autor"];
$genero=		$_POST["genero"];
$instrumento=	$_POST["instrumento"];

$bd = mysqli_connect("localhost","root","","remusic") OR DIE ("Erro ao conectar!");

$es=mysqli_query($bd,"update musicas set nome_musica='$nome_musica', autor='$autor', genero='$genero', instrumento='$instrumento' where id_musica='$id'");
if ($es==1)
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
