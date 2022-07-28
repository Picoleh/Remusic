<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/indexado.css">
    <link rel="icon" type="imagem/png" href="../img/Icon.png" />
    <script >
function funcao1(){
alert("Logado com sucesso!");
window.location.href = '../HTML/index.php';
}

function funcao2(){
alert("senha ou email incorretos!");
window.location.href = '../HTML/login.html';
}
</script>
    <title>Remusic</title>
</head>
<body>

<?php
session_start();
include('../PHP/conexao.php');
if(!$_SESSION['email']){
    header('Location: login.html');
    exit();
}
else{
    $email = $_SESSION['email'];
    $pegaID =mysqli_query($conexao,"select * from cliente where email='$email'");
    $reg = mysqli_fetch_array($pegaID);

    if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
else{
while ($reg!=0)
{
  $id_cliente = $reg["id_cliente"];

  $reg = mysqli_fetch_array($pegaID);
}
$_SESSION['id_cliente'] = $id_cliente;
}
}
?>

<header>

<div class="top-bar-menu">
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

<div class="texto-img">
    <div class="linha"></div>
<p><b>Tenha todas suas músicas nas palmas de suas mãos!</b> isso mesmo, nosso site está aqui para te auxiliar a gerenciar 
    quais músicas você já toca, está aprendendo ou quer aprender.E ainda sorteia um repertório com tudo o que você desejar!</p>
</div>

</header>

<main>
<div class="linha"></div>

<div class="setor">

<div class="engloba-img-txt">
    <div class="img-container">
        <a href="../HTML/adiciona.html"><img src="../img/icone-adc.png"></a>
    </div>

<div class="separador"></div>

    <div class="txt-container"><p>Clique na Imagem ao lado ou no Botão abaixo para adicionar uma nova música ao seu repertório.</p>
        
        <div class="button-container">
        <a href="../HTML/adiciona.html"><button type="button" class="button-adc"><b>Quero Adicionar!</b></button></a>
    </div></div>
    

</div>

    <div class="setor-pesq">

        <div class="engloba-img-txt">
            <div class="img-container">
                <a href="../HTML/pesquisa.html"><img src="../img/icone-pesq.png"></a>
            </div>
        
        <div class="separador"></div>
        
            <div class="txt-container"><p>Clique na Imagem ao lado ou no Botão abaixo para pesquisar uma música presente em seu repertório.</p>
                
                <div class="button-container">
                <a href="../HTML/pesquisa.html"><button type="button" class="button-adc"><b>Quero Pesquisar!</b></button></a>
            </div></div>
                    
        </div>

        </div>

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