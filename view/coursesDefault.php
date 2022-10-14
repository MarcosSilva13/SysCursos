<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Cursos</title>
</head>
<body>
    <?php include 'menuDefault.php'; ?>
    <main id="content">
        <div class="div-search-bar">
            <form class="form-search" action="" method="POST">
                <input class="search-bar" type="text" name="search" placeholder="Pesquisar cursos...">
                <input class="submit" type="submit" name="submit" value="Pesquisar">
            </form>
        </div>
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

                    if (isset($_POST['submit'])) {
                        $course_name = $_POST['search'];
                        $list = $dao->findCourse($course_name);

                        if (!$list == '') {
                            foreach ($list as $values) {
                                echo '<tr>';
                                echo '<td>' . $values['nome_curso'] . '</td>';
                                echo '<td>' . $values['valor_curso'] . '</td>';
                                echo '<td>' . $values['duracao_curso'] . 'H</td>';
                                echo '<td>' . $values['descricao_curso'] . '</td>';
                                echo '<td>
                                <form action="formBuyCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="hidden" name="course_name" id="course_name" value="' . $values['nome_curso'] . '"/>
                                <input type="hidden" name="course_price" id="price" value="' . $values['valor_curso'] . '"/>
                                <input type="hidden" name="course_duration" id="course_duration" value="' . $values['duracao_curso'] . '"/>
                                <input type="submit" id="buy" value="Comprar"/>
                                </form></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<p>Curso não encontrado!</p>';
                            
                        }    
                    } else {
                        $list = $dao->listCourses();

                        foreach ($list as $values) {
                            echo '<tr>';
                            echo '<td>' . $values['nome_curso'] . '</td>';
                            echo '<td>' . $values['valor_curso'] . '</td>';
                            echo '<td>' . $values['duracao_curso'] . 'H</td>';
                            echo '<td>' . $values['descricao_curso'] . '</td>';
                            echo '<td>
                            <form action="formBuyCourse.php" method="POST">
                            <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                            <input type="hidden" name="course_name" id="course_name" value="' . $values['nome_curso'] . '"/>
                            <input type="hidden" name="course_price" id="price" value="' . $values['valor_curso'] . '"/>
                            <input type="hidden" name="course_duration" id="course_duration" value="' . $values['duracao_curso'] . '"/>
                            <input type="submit" id="buy" value="Comprar"/>
                            </form></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
    </main>

    <script src="../JS/controleMenu.js"></script>
</body>
</html>