<?php
require_once '../verifyLogin.php'; //verifica se o usuario esta logado, para nao entrar direto no painel
//session_abort();
?>

<header>
        <a href="#" class="btn-abrir" onclick="openMenu()">&#9776; Abrir</a>
        <h2>Bem Vindo(a): <?= $_SESSION['usuario'];?></h2>
</header>
    <nav id="menu">
        <a href="#" onclick="closeMenu()">&times; Fechar</a>
        <a href="coursesDefault.php"> <i class="fas fa-home"></i>Home</a>
        <a href="coursesUser.php"> <i class="fas fa-book"></i>Meus Cursos</a>
        <a href="company.php"> <i class="fa-regular fa-building"></i>Empresas</a>
        <a href="configUser.php"> <i class="fa fa-gear"></i>Configuração</a>
        <a href="../logout.php"> <i class="fas fa-power-off"></i>Logout</a>
    </nav>
    
    <!-- fas fa-sign-out-alt -->