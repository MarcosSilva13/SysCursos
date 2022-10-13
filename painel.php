<?php
include 'verifyLogin.php'; //verifica se o usuario esta logado, para nao entrar direto no painel
//session_abort();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/menuStyle.css">
    <title>Painel</title>
</head>
<body>
    <header>
        <a href="#" class="btn-abrir" onclick="openMenu()">&#9776; Abrir</a>
        <h2>Bem vindo(a): <?= $_SESSION['usuario'];?></h2>
    </header>
    <nav id="menu">
        <a href="#" onclick="closeMenu()">&times; Fechar</a>
        <a href="#">Home</a>
        <a href="#">Meus Cursos</a>
        <a href="#">Alguma coisa</a>
        <a href="#">Configuração</a>
        <a href="logout.php">Logout</a>
    </nav>
    <main id="content">
        <h1>SysCursos</h1>
        <p>Todo conteúdo do sistema aqui.</p>
    </main>

    <!-- JavaScript -->
    <script src="JS/controleMenu.js"></script>
</html>