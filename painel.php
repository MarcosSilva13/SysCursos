<?php
//include 'verifyLogin.php'; //verifica se o usuario esta logado, para nao entrar direto no painel
//session_abort();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="CSS/menuStyle.css">
    <title>Painel</title>
</head>
<body>

    <header>
        <a href="#" class="btn-abrir" onclick="openMenu()">&#9776; Abrir</a>
        <!--<h2>Bem vindo(a): <?= $_SESSION['usuario'];?></h2>-->
    </header>
    <nav id="menu">
        <a href="#" onclick="closeMenu()">&times; Fechar</a>
        <a href="painel.php">Home</a>
        <!--<a href="#" onclick="exibir(1)">Home</a>-->
        <!--<a id="abc" href="#" onclick="exibir(2)">Meus Cursos</a> -->
        <a id="abc" href="#">Meus Cursos</a>
        <a href="#">Alguma coisa</a>
        <a href="#">Configuração</a>
        <a href="logout.php">Logout</a>
    </nav>
    <main id="content">
        <table id="tab">
            <tr>
                <th>Curso</th>
                <th>Valor</th>
                <th>Duração</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>

            <?php 
                require_once 'dao/DaoCourses.php';
                $dao = new DaoCourses();

                $list = $dao->listCourses();

                foreach ($list as $values) {
                    echo '<tr>';
                    echo '<td>' . $values['nome_curso'] . '</td>';
                    echo '<td>' . $values['valor_curso'] . '</td>';
                    echo '<td>' . $values['duracao_curso'] . 'H</td>';
                    echo '<td>' . $values['descricao_curso'] . '</td>';
                    echo '<td>
                    <form action="deleteCourse.php" method="POST">
                    <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                    <input type="submit" id="buy" value="Comprar"/>
                    </form></td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </main>

    <!-- JavaScript -->
    <script src="JS/controleMenu.js"></script>
</body>
</html>