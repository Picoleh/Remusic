<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/consultar.css">
	<link rel="icon" type="imagem/png" href="../img/Icon.png" />
    <title>Remusic Inclusão</title>
</head>
<body>
<header>

<div class="top-bar-menu"><a href="../HTML/pesquisa.html"><img src="../img/seta.png" class="seta"></a>
    <nav>
<div class="menu">
    <ul>
<li><a href="index.html"><img src="../img/Icon.png" width="22" height="22"></a></li>
<li><a href="perfil.php">PERFIL</a></li>
<li><a href="">MINHA LISTA</a></li>
<li><a href="../HTML/sortear.php">SORTEAR</a></li>
</ul>
</div>
</nav>

</div>

<div class="linha"></div>
</header>


<main>
	<hr>

<div class="setor">
<?php
session_start();
include('conexao.php');

$id_cliente = $_SESSION['id_cliente'];
$expressao=		$_POST["expressao"];

if (isset($_POST ["op"]))
{
	$op = $_POST ["op"];
	if ($op=="nome")
		$consulta=mysqli_query($conexao,"select * from musicas where nome_musica like '%$expressao%' and id_cliente='$id_cliente'");
	if ($op=="genero")
		$consulta=mysqli_query($conexao,"select * from musicas where genero='$expressao' and id_cliente='$id_cliente'");
	if ($op=="instrumento")
		$consulta=mysqli_query($conexao,"select * from musicas where instrumento='$expressao' and id_cliente='$id_cliente'");
} else
{
	echo "erro 1";
	exit;
}
$reg = mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
while ($reg!=0)
{
	$id = $reg["id_musica"];
	$nome_musica = $reg["nome_musica"];
	$autor = $reg["autor"];
	$genero = $reg["genero"];
	$instrumento = $reg["instrumento"];?>

	<div class="container">
	<label class="lId">ID Música:</label><input type="text" class="dados" value="<?php echo $id;?>" disabled="">
	<label class="lNome">Nome Música:</label><input type="text" class="dados" value="<?php echo $nome_musica;?>"disabled="">
	<label class="lAutor">Autor:</label><input type="text" class="dados" value="<?php echo $autor;?>" disabled=""><br>
	<label class="lGenero">Gênero:</label><input type="text" class="dados" value="<?php echo $genero;?>" disabled="">
	<label class="lInstru">Instrumento:</label><input type="text" class="dados" value="<?php echo $instrumento;?>" disabled="">
	
	<div class="simbolo-container">
	<a href="excluir.php?id=<?php echo $id;?>" onclick = "return confirm ('Excluir a musica?');"><img src="../img/lixo.png" width="36" class="simbolo"></a>
	<a href="alterar.php?id=<?php echo $id;?>"><img src="../img/lapis.png" width="36" class="simbolo"></a></div></div>

	

	<?php
	$reg = mysqli_fetch_array($consulta);?>
		
<?php	
} ?><footer class="rodape">

<div class="rodape-img">
<img src="../img/icon.png" width="76" height="76">
</div>

<div class="rodape-txt">
	<p>@2021 - REMUSIC - Seu Repertório Sempre junto à Você! - Todos os direitos reservados.</p>
	
	<div class="rodape-icons">
<a href="https://www.instagram.com/lucas.picoli/"><img src="../img/insta.png" class="icons"></a>
<a href="https://twitter.com/OPicoleh"><img src="../img/tt.png" class="icons"></a>
<a href=""><img src="../img/mail.png" class="icons"></a>
<a href="https://www.youtube.com/channel/UCKmK9bhq4_rk_KwWDa5ORzA"><img src="../img/yt.png" class="icons"></a>
</div>

</div>



</footer>
</div>
</main>


</body>
</html>