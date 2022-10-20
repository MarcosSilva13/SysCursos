<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Cursos</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; ?>
<main id="content">
    <table>
        <tr>
            <th>Curso</th>
            <th>Valor</th>
            <th>Duração</th>
            <th>Descricao</th>
            <th>Ações</th>
        </tr>

        <?php 
            require_once '../dao/DaoCourses.php';
            $dao = new DaoCourses();

            $list = $dao->listCourses();

            foreach ($list as $values) {
                echo '<tr>';
                echo '<td>' . $values['nome_curso'] . '</td>';
                echo '<td>' . $values['valor_curso'] . '</td>';
                echo '<td>' . $values['duracao_curso'] . 'H</td>';
                echo '<td>' . $values['descricao_curso'] . '</td>';
                echo '<td id="acoes"><a id="editar" href="form.php?id_course=' . $values['id_curso'] . '&acao=2">Editar</a>
                <form action="deleteCourse.php" method="POST">
                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                <input type="submit" id="excluir" value="Excluir"/>
                </form></td>';
                echo '</tr>';
            }
        ?>
    </table>
</main>
<script src="../JS/controleMenu.js"></script>
</body>
</html>