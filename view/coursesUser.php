<!DOCTYPE html>
<html lang="pt_BR">
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
    <title>Meus Cursos</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; 
        //valor vindo de login.php
        $id_user = $_SESSION['id_user']; 
    ?> 
    <main id="content">
        
        <div id="messages"></div>
        
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
                require_once '../dao/DaoSale.php';
                $dao = new DaoSale();

                $list = $dao->listCoursesUser($id_user);

                if (!$list == '') {
                    foreach ($list as $values) {
                        echo '<tr>';
                        echo '<td>' . $values['nome_curso'] . '</td>';
                        echo '<td>' . $values['valor_curso'] . '</td>';
                        echo '<td>' . $values['duracao_curso'] . 'H</td>';
                        echo '<td>' . $values['descricao_curso'] . '</td>';
                        echo '<td>' . $values['nome_emp'] . '</td>';
                        echo '<td>
                            <form id="form-course" action="" method="POST">
                            <input type="hidden" name="id_sale" id="id_sale" value="' . $values['id_venda'] . '"/>
                            <input type="submit" id="cancel" value="Remover curso"/>
                            </form></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<div id="messages">
                            <div class="message-warning">
                                Atenção: Você não tem cursos comprados!
                                <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>';
                }
            ?>
        </table>
    </main>
    <?php require_once 'footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Courses/deleteCourseUser.js"></script>
</body>
</html>