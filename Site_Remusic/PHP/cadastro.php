<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script >
function funcao1(){
alert("Conta criada com sucesso!");
}

function funcao2(){
alert("Erro em algum dado");
}

</script>
</head>
<body>
<?php
session_start();
include('conexao.php');

if(empty($_POST['email'])|| empty($_POST['senha'])){
  header('Location: ../HTML/login.html');
  exit();
}

$nome_conta=mysqli_real_escape_string($conexao,$_POST['nome']);
$email=mysqli_real_escape_string($conexao, $_POST['email']);
$senha=mysqli_real_escape_string($conexao,$_POST['senha']);

$query = "insert into cliente values('','$nome_conta','$email','$senha')"; 

$incluir=mysqli_query($conexao,$query);

if ($incluir==1)
{
$_SESSION['email'] = $email;
 header('Location: ../HTML/index.php');
 ?> <script language="javascript" type="text/javascript"> funcao1();</script>
 <?php
 exit();
}
else
{
    header('Location: ../HTML/login.html');
    ?> <script language="javascript" type="text/javascript"> funcao2();</script>
    <?php
    exit();
}

?>

</body>
</html>