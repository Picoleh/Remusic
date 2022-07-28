<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSS/perfil.css">
	<link rel="icon" type="imagem/png" href="../img/Icon.png" />
    <title>Remusic Perfil</title>
</head>
<body>
<header>
<?php
session_start();
include('conexao.php');

if(!$_SESSION['email']){
    header('Location: login.html');
    exit();
}

$id_cliente = $_SESSION['id_cliente'];
$query = mysqli_query($conexao,"select * from cliente where id_cliente = '$id_cliente'");
$count = mysqli_query($conexao, "select * from musicas where id_cliente = '$id_cliente'");


$total = mysqli_num_rows($count);

$reg = mysqli_fetch_array($query);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
while ($reg!=0)
{
	$id_cliente = $reg["id_cliente"];
	$nome_cliente = $reg["nome_cliente"];
	$email = $reg["email"];
	$senha = $reg["senha"];
    ?>

<?php
	$reg = mysqli_fetch_array($query);
    }
?>
<div class="top-bar-menu"><a href="../HTML/index.php"><img src="../img/seta.png" class="seta"></a>
    <nav>
<div class="menu">
    <ul>
<li><a href="../HTML/index.php"><img src="../img/Icon.png" width="22" height="22"></a></li>
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
<div class="setor">
    <div class="borda">
        <div class="area_form">
            <form action="../PHP/regravaConta.php" id="form" class="form" method="POST">
            <div class="container">
	            <label >Nome Perfil:</label><input type="text" class="lNome" value="<?php echo $nome_cliente;?>"><br>
	            <label >Email:</label><input type="text" class="lEmail" value="<?php echo $email;?>"><br>
	            <label>Senha:</label><input type="password" class="lSenha" value="<?php echo $senha;?>"><br>
            </div>
            <div class="imgButton-container">
                <img src="../img/confirmar.png" width="50" height="50"><input class="button" type="submit" value="Salvar">
            </div>
            </form>
        </div>

        <div class="area_form2">
            <form action="../PHP/regravaConta.php" id="form" class="form" method="POST">
            <div class="container">
	            <label>Qtd de musicas: <label><input type="text" class="lNome" value="<?php echo $total;?>"><br>
            </div>
            </form>
            
        </div>
        <a href="logout.php"><input type="submit" class="Bt_logout" value="Sair da conta"></a>
    </div>
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