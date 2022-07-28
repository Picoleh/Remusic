<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSS/sortear.css">
	<link rel="icon" type="imagem/png" href="../img/Icon.png" />
    <title>Remusic Perfil</title>
</head>
<script>
var visibilidade = true;

window.onload = ocultar;
 
 function exibirAutor() {
     document.getElementById("selAutor").style.display = "inline";
     document.getElementById("selGene").style.display = "none";
     document.getElementById("selInstru").style.display = "none";
 }

 function exibirGene() {
     document.getElementById("selGene").style.display = "inline";
     document.getElementById("selAutor").style.display = "none";
     document.getElementById("selInstru").style.display = "none";
 }

 function exibirInstru() {
     document.getElementById("selInstru").style.display = "inline";
     document.getElementById("selGene").style.display = "none";
     document.getElementById("selAutor").style.display = "none";
 }

 function ocultar(){
    document.getElementById("selAutor").style.display = "none";
    document.getElementById("selGene").style.display = "none";
    document.getElementById("selInstru").style.display = "none";
}

function updateTextInput(val) {
          document.getElementById('demo').value=val; 
        }

</script>
<body>
<header>
<?php
session_start();
include('../PHP/conexao.php');

if(!$_SESSION['email']){
    header('Location: login.html');
    exit();
}

$id_cliente = $_SESSION['id_cliente'];
$query = mysqli_query($conexao,"select distinct autor from musicas where id_cliente = '$id_cliente'");
$query2 = mysqli_query($conexao,"select distinct genero from musicas where id_cliente = '$id_cliente'");
$query3 = mysqli_query($conexao,"select distinct instrumento from musicas where id_cliente = '$id_cliente'");

$reg = mysqli_fetch_array($query);
$reg2 = mysqli_fetch_array($query2);
$reg3 = mysqli_fetch_array($query3);

if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
?>
<div class="top-bar-menu"><a href="../HTML/index.php"><img src="../img/seta.png" class="seta"></a>
    <nav>
<div class="menu">
    <ul>
<li><a href="index.php"><img src="../img/Icon.png" width="22" height="22"></a></li>
<li><a href="../PHP/perfil.php">PERFIL</a></li>
<li><a href="">MINHA LISTA</a></li>
<li><a href="sortear.php">SORTEAR</a></li>
</ul>
</div>
</nav>

</div>

<div class="linha"></div>
</header>
<main>
<div class="setor">
<form action="../PHP/fazSorteio.php" id="form" class="form" method="POST">
            <div class="container">
                <legend>
                    Escolha uma das categorias abaixo e sorteie uma ou mais música(s) para tocar:
                </legend>
	    <div class="junta1"><input type="radio" class="inputs"name="op" value="autor" onclick="exibirAutor();"><label>Por Autor:</label>
                <div class="range-container">
                    <label class="label-range">Quantidade de Músicas a serem sorteadas:</label><br>
                    <input type="range" min="1" max="10" step="1" value="2" class="range" id="range" onchange="updateTextInput(this.value);">
                    <p class="mostraValor">Valor:<input type="number" name="numero" form="form"class="demo"id="demo" value="2"></p>
                </div> 
        <select id="selAutor" name="opcaoAutor" form="form" class="select"></div>
                <?php
                while ($reg!=0)
{
	$id_musica = $reg["id_musica"];
	$nome_musica = $reg["nome_musica"];
	$autor = $reg["autor"];
	$genero = $reg["genero"];
    $instrumento = $reg["instrumento"];
    $id_cliente = $reg["id_cliente"];
    ?>
                <option value="<?php echo $autor;?>"><?php echo $autor;?></option>
<?php
	$reg = mysqli_fetch_array($query);
    }
    ?>
                </select><br>
        <div class="junta2"><input type="radio" class="inputs"name="op" value="genero" onclick="exibirGene();"><label>Por Genero:</label>
        <select id="selGene" name="opcaoGenero" form="form" class="select"></div>
                <?php

                while ($reg2!=0)
{
	$id_musica = $reg2["id_musica"];
	$nome_musica = $reg2["nome_musica"];
	$autor = $reg2["autor"];
	$genero = $reg2["genero"];
    $instrumento = $reg2["instrumento"];
    $id_cliente = $reg2["id_cliente"];
    ?>
                <option value="<?php echo $genero;?>"><?php echo $genero;?></option>
<?php
	$reg2 = mysqli_fetch_array($query2);
    }
    ?>
                </select><br>
        <div class="junta3"><input type="radio" class="inputs"name="op" value="instrumento" onclick="exibirInstru();"><label>Por Instrumento:</label>
        <select id="selInstru" name="opcaoInstrumento" form="form" class="select"></div>
                <?php

                while ($reg3!=0)
{
	$id_musica = $reg3["id_musica"];
	$nome_musica = $reg3["nome_musica"];
	$autor = $reg3["autor"];
	$genero = $reg3["genero"];
    $instrumento = $reg3["instrumento"];
    $id_cliente = $reg3["id_cliente"];
    
    ?>
                <option value="<?php echo $instrumento;?>"><?php echo $instrumento;?></option>
<?php
	$reg3 = mysqli_fetch_array($query3);
    }
    ?>
                </select>
            </div>
            <div class="button-container">
            <input class="button" type="submit" value="Sortear">
            </div>
            </form>
        </div>
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
</main>
</body>
</html>