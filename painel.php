<?php
include 'verifyLogin.php';
//session_abort();
?>

<h2>Ola, <?= $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>