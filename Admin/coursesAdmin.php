<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cursos</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <div class="div-search-bar">
            <form class="form-search" action="" method="POST">
                <input class="search-bar" type="text" name="search" placeholder="Pesquisar cursos...">
                <input class="submit" type="submit" name="submit" value="Pesquisar">
                <button class="btn-submit" type="submit" name="btn-submit">Ver com empresas</button>
            </form>
        </div>

        <div id="messages">
            <?php //sessão vindo de editCourse.php
                if (isset($_SESSION['update-course-ok'])): ?>
                    <div class="message-confirm">
                        Confirmação: Curso atualizado com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['update-course-ok']); ?>

            <?php //sessão vindo de editCourse.php
                if (isset($_SESSION['update-course-fail'])): ?>
                    <div class="message-warning">
                        Atenção: É preciso modificar pelo menos um dos campos!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['update-course-fail']); ?>

            <?php //sessão vindo de editCourse.php
                if (isset($_SESSION['missing-course-values'])): ?>
                    <div class="message-error">
                        Erro: Algum campo não foi preenchido corretamente!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['missing-course-values']); ?>

            <?php //sessão vindo de deleteCourse.php
                if (isset($_SESSION['delete-course-ok'])): ?>
                <div class="message-confirm">
                        Confirmação: Curso deletado com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['delete-course-ok']); ?>
        </div>
        
        <?php if (isset($_POST['btn-submit'])) {  ?>
            <table>
                <tr>
                    <th>Curso</th>
                    <th>Valor</th>
                    <th>Duração</th>
                    <th>Descrição</th>
                    <th>Empresa</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <?php 
                    require_once '../dao/DaoCourses.php';
                    $dao = new DaoCourses();

                    if (isset($_POST['submit'])) {
                        $course_name = filter_input(INPUT_POST, 'search');
                        $list = $dao->findCourse($course_name);

                        if (!$list == '') { // se a lista não tiver vazia
                            foreach ($list as $values) {
                                echo '<tr>';
                                echo '<td>' . $values['nome_curso'] . '</td>';
                                echo '<td>' . $values['valor_curso'] . '</td>';
                                echo '<td>' . $values['duracao_curso'] . 'H</td>';
                                echo '<td>' . $values['descricao_curso'] . '</td>';
                                echo '<td>' . $values['nome_emp'] . '</td>';
                                echo '<td> <form action="formEditCourse.php" method="POST">
                                    <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                    <input type="submit" id="editar" value="Editar"/>
                                    </form></td>';
                                //echo '<td id="acoes"><a id="editar" href="form.php?id_course=' . $values['id_curso'] . '&acao=2">Editar</a></td>';
                                echo '<td><form action="deleteCourse.php" method="POST">
                                    <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                    <input type="submit" id="excluir" value="Excluir"/>
                                    </form></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<div id="messages">
                                    <div class="message-error">
                                        Erro: Curso não encontrado, pesquise novamente!
                                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                                    </div>';
                        }    
                    } else {
                        $list = $dao->listCourses();
        
                        foreach ($list as $values) {
                            echo '<tr>';
                            echo '<td>' . $values['nome_curso'] . '</td>';
                            echo '<td>' . $values['valor_curso'] . '</td>';
                            echo '<td>' . $values['duracao_curso'] . 'H</td>';
                            echo '<td>' . $values['descricao_curso'] . '</td>';
                            echo '<td>' . $values['nome_emp'] . '</td>';
                            echo '<td> <form action="formEditCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="submit" id="editar" value="Editar"/>
                                </form></td>';
                            //echo '<td id="acoes"><a id="editar" href="form.php?id_course=' . $values['id_curso'] . '&acao=2">Editar</a></td>';
                            echo '<td> <form action="deleteCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="submit" id="excluir" value="Excluir"/>
                                </form></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>

        <?php } else { ?>

            <table>
                <tr>
                    <th>Curso</th>
                    <th>Valor</th>
                    <th>Duração</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <?php 
                    require_once '../dao/DaoCourses.php';
                    $dao = new DaoCourses();

                    if (isset($_POST['submit'])) {
                        $course_name = filter_input(INPUT_POST, 'search');
                        $list = $dao->findCourseDefault($course_name);

                        if (!$list == '') { // se a lista não tiver vazia
                            foreach ($list as $values) {
                                echo '<tr>';
                                echo '<td>' . $values['nome_curso'] . '</td>';
                                echo '<td>' . $values['valor_curso'] . '</td>';
                                echo '<td>' . $values['duracao_curso'] . 'H</td>';
                                echo '<td>' . $values['descricao_curso'] . '</td>';
                                echo '<td> <form action="formEditCourse.php" method="POST">
                                    <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                    <input type="submit" id="editar" value="Editar"/>
                                    </form></td>';
                                //echo '<td id="acoes"><a id="editar" href="form.php?id_course=' . $values['id_curso'] . '&acao=2">Editar</a></td>';
                                echo '<td><form action="deleteCourse.php" method="POST">
                                    <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                    <input type="submit" id="excluir" value="Excluir"/>
                                    </form></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<div id="messages">
                                    <div class="message-error">
                                        Erro: Curso não encontrado, pesquise novamente!
                                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                                    </div>';
                        }    
                    } else {
                        $list = $dao->listCourseDefault();
        
                        foreach ($list as $values) {
                            echo '<tr>';
                            echo '<td>' . $values['nome_curso'] . '</td>';
                            echo '<td>' . $values['valor_curso'] . '</td>';
                            echo '<td>' . $values['duracao_curso'] . 'H</td>';
                            echo '<td>' . $values['descricao_curso'] . '</td>';
                            echo '<td> <form action="formEditCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="submit" id="editar" value="Editar"/>
                                </form></td>';
                            //echo '<td id="acoes"><a id="editar" href="form.php?id_course=' . $values['id_curso'] . '&acao=2">Editar</a></td>';
                            echo '<td> <form action="deleteCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="submit" id="excluir" value="Excluir"/>
                                </form></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
        <?php } ?>
    </main>
<script src="../JS/controleMenu.js"></script>
<script src="../JS/messages.js"></script>
</body>
</html>