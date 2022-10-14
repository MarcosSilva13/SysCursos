<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <title>Cursos</title>
</head>
<body>
    <table id="tab">
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
                echo '<td>
                <form action="deleteCourse.php" method="POST">
                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                <input type="submit" id="buy" value="Comprar"/>
                </form></td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>