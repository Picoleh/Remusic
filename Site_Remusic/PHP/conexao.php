<?php
define('HOST', 'localhost');
define('USUARIO','root');
define('SENHA','');
define('DB','remusic');

$conexao = mysqli_connect(HOST, USUARIO,SENHA,DB) or die('erro con');

?>