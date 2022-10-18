<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Meus Cursos</title>
</head>
<body>
    <?php include 'menuDefault.php'; $id_user = $_SESSION['id_user'];?>
        <main id="content">
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
                            <form action="../deleteSaleUser.php" method="POST">
                            <input type="hidden" name="id_course" id="id_course" value="' . $values['id_curso'] . '"/>
                            <input type="hidden" name="id_user" id="id_user" value="' . $id_user . '"/>
                            <input type="submit" id="cancel" value="Remover curso"/>
                            </form></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<p>Você não tem cursos comprados!</p>';
                    }
                ?>
            </table>
        </main>
    <script src="../JS/controleMenu.js"></script>
</body>
</html>