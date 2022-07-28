<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/alterar.css">
	<link rel="icon" type="imagem/png" href="../img/Icon.png" />
 <TITLE>Remusic alteração</TITLE>
</HEAD>
<?php

$id=trim($_GET["id"]);

$bd=mysqli_connect("localhost","root","","remusic") or die ("erro!");


$sql="select * from musicas where id_musica = '$id'"; //consulta sql

$consulta=mysqli_query($bd, $sql); //faz a consulta de todos os registros
$reg=mysqli_fetch_array($consulta); // cria uma matriz com todos os campos e registros

if ($reg==0)
{
	 echo "ERRO - Registro não Existe.  ";
	 exit;
}
else
{
	$id = $reg["id_musica"];
	$nome_musica = $reg["nome_musica"];
	$autor = $reg["autor"];
	$genero = $reg["genero"];
	$instrumento = $reg["instrumento"];
}
?>
<body>
<header>

<div class="top-bar-menu">
<img src="../img/lupa.png" alt="deu ruim" >
        <div class="texto-img">
    <p><b> Edite suas músicas através do formulário abaixo, </b>e logo em seguida faça o que quiser 
        com elas, edite-as, exclua-as ou simplesmente acesse suas informações</p>
    </div>
</div>

</header>
<div class="linha"></div>
<main>
	<div class="setor">
	<a href="index.php"><img src="../img/seta.png" class="seta"></a>
<div class="area_form">

	<form method="POST" action="regrava.php" id="form" class="form">
	<fieldset>
    <legend>Formulário Edição</legend>
	<label class="escolha">Edite qualquer uma das seguintes categorias:</label><br>
		 <input type="hidden" name="id" value ='<?php echo "$id"; ?>'>
		
		<div class="top-label"><label>Nome da Música:</label>
		<input class="campo_nome" type="text" name="nome_musica" value ='<?php echo "$nome_musica"; ?>'><br></div>

		<div class="top-label"><label>Autor:</label>
		<input class="campo_autor" type="text" name="autor" value ='<?php echo "$autor"; ?>'><br></div>

		<div class="top-label"><label>Gênero:</label>
		<input class="campo_genero" type="text" name="genero" value ='<?php echo "$genero"; ?>'><br></div>

		<?php
		if($instrumento == "violao"){
			?>
			<div class="top-label"><label>Instrumento:</label><select id="select" name="instrumento" form="form" class="campo_instrumento">
        <option value="violao" selected>Violão</option>
        <option value="guitarra">Guitarra</option>
        <option value="baixo">Baixo</option>
        <option value="teclado">Teclado</option>
    </select></div><br>
	<?php
		}
		else if($instrumento == "guitarra"){
			?>
			<div class="top-label"><label>Instrumento:</label><select id="select" name="instrumento" form="form" class="campo_instrumento">
        <option value="violao">Violão</option>
        <option value="guitarra" selected>Guitarra</option>
        <option value="baixo">Baixo</option>
        <option value="teclado">Teclado</option>
    </select></div><br>
	<?php
		}
		else if($instrumento == "baixo"){
			?>
			<div class="top-label"><label>Instrumento:</label><select id="select" name="instrumento" form="form" class="campo_instrumento">
        <option value="violao">Violão</option>
        <option value="guitarra">Guitarra</option>
        <option value="baixo" selected>Baixo</option>
        <option value="teclado">Teclado</option>
    </select></div><br>
	<?php
		}
		else{
			?>
			<div class="top-label"><label>Instrumento:</label><select id="select" name="instrumento" form="form" class="campo_instrumento">
        <option value="violao">Violão</option>
        <option value="guitarra">Guitarra</option>
        <option value="baixo">Baixo</option>
        <option value="teclado" selected>Teclado</option>
    </select></div><br>
	<?php
		}
?>
		

	<input class="button_submit" type="submit" value="Alterar">
    <input class="button_submit" type="reset" value="Limpar">
     
</fieldset>
	</form>	
</div>
<a href="index.php"><input class="button_back" type="button" value="Voltar"></a>
</div>
</main>
<footer class="rodape">

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
</body>
</html>
