<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script >
function funcao1(){
alert("Registro Incluido com sucesso!");
window.location.href = '../HTML/adiciona.html';
}

function funcao2(){
alert("Registro NÃO Incluido!");
window.location.href = '../HTML/adiciona.html';
}

</script>
</HEAD>
<BODY>
<?php
session_start();
include('conexao.php');
if(!$_SESSION['email']){
    header('Location: login.html');
    exit();
}
$email = $_SESSION['email'];
$id_cliente = $_SESSION['id_cliente'];
$nome=$_POST['nome'];
$autor=$_POST['autor'];
$genero=$_POST['genero'];
$instrumento=$_POST['instrumento'];

$in = "insert into musicas values ('', '$nome', '$autor','$genero','$instrumento','$id_cliente')";


$incluir=mysqli_query($conexao,$in);

if ($incluir==1)
{
  ?> <script language="javascript" type="text/javascript"> funcao1();</script>
  
  <?php
}
else
{
  ?> <script language="javascript" type="text/javascript"> funcao2();</script>
  
  <?php
}

?>
</BODY>
</HTML>

