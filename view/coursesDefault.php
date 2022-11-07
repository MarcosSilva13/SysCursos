<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="imagens/icone.png" rel="icon" type="image/png">-->
    <link rel="apple-touch-icon" sizes="180x180" href="../imagens/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../imagens/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../imagens/favicon-16x16.png">
    <link rel="manifest" href="../imagens/site.webmanifest">
    <link rel="mask-icon" href="../imagens/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cursos</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; ?>
    <main id="content">
        <div class="div-search-bar">
            <form class="form-search" action="" method="POST">
                <input class="search-bar" type="text" name="search" placeholder="Pesquisar cursos...">
                <input class="submit" type="submit" name="submit" value="Pesquisar">
            </form>
        </div>

        <div id="messages">
            <?php //sessão vindo de confirmSale.php
                if (isset($_SESSION['confirm-sale-not-ok'])): ?>
                    <div class="message-error">
                        Erro: Não foi possível realizar a compra!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['confirm-sale-not-ok']); ?>

            <?php //sessão vindo de confirmSale.php
                if (isset($_SESSION['values-not-ok'])): ?>
                    <div class="message-error">
                        Erro: Dados insuficientes para realizar a compra!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['values-not-ok']); ?>
            
            <?php //sessão vindo de confirmSale.php
                if (isset($_SESSION['wrong-password'])): ?>
                <div class="message-error">
                    Erro: Senha incorreta!
                    <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                </div>
            <?php endif; unset($_SESSION['wrong-password']); ?>
        </div>

        <table id="tab">
            <tr>
                <th>Curso</th>
                <th>Valor</th>
                <th>Duração</th>
                <th>Descrição</th>
                <th>Empresa</th>
                <th>Ações</th>
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
                            echo '<td>
                                <form action="formBuyCourse.php" method="POST">
                                <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                                <input type="hidden" name="course_name" id="course_name" value="' . $values['nome_curso'] . '"/>
                                <input type="hidden" name="course_price" id="price" value="' . $values['valor_curso'] . '"/>
                                <input type="hidden" name="course_duration" id="course_duration" value="' . $values['duracao_curso'] . '"/>
                                <input type="hidden" name="company_name" id="company_name" value="' . $values['nome_emp'] . '"/>
                                <input type="submit" id="buy" value="Comprar"/>
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
                        echo '<td>
                            <form action="formBuyCourse.php" method="POST">
                            <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                            <input type="hidden" name="course_name" id="course_name" value="' . $values['nome_curso'] . '"/>
                            <input type="hidden" name="course_price" id="price" value="' . $values['valor_curso'] . '"/>
                            <input type="hidden" name="course_duration" id="course_duration" value="' . $values['duracao_curso'] . '"/>
                            <input type="hidden" name="company_name" id="company_name" value="' . $values['nome_emp'] . '"/>
                            <input type="submit" id="buy" value="Comprar"/>
                            </form></td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
    </main>
    <?php require_once 'footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>