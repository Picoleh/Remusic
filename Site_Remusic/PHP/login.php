<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</HEAD>
<BODY>
<?php
session_start();
include('conexao.php');

if(empty($_POST['email'])|| empty($_POST['senha'])){
  header('Location: ../HTML/login.html');
  exit();
}

$email=mysqli_real_escape_string($conexao, $_POST['email']);
$senha=mysqli_real_escape_string($conexao,$_POST['senha']);

$query = "select * from cliente where email = '$email' and senha = '$senha'";

$result=mysqli_query($conexao, $query);
$row=mysqli_num_rows($result);

if ($row == 1)
{
 $_SESSION['email'] = $email;
 header('Location: ../HTML/index.php');
 exit();
}
else
{
  header('Location: ../HTML/login.html');
  exit();
}
?> 
</BODY>
</HTML>

