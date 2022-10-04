<?php
include 'verifyLogin.php'; //verifica se o usuario esta logado, para nao entrar direto no painel
//session_abort();
?>

<h2>Ola, <?= $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>