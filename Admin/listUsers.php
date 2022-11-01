<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Usuários</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <table id="tab">
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Tipo</th>
                </tr>

                <?php 
                    require_once '../dao/DaoUser.php';
                    $dao = new DaoUser();

                    $list = $dao->listUsers();

                    foreach ($list as $values) {
                        echo '<tr>';
                        echo '<td>' . $values['login'] . '</td>';
                        echo '<td>' . $values['nome'] . '</td>';
                        echo '<td>' . $values['cpf'] . '</td>';
                        echo '<td>' . $values['email'] . '</td>';
                        echo '<td>' . $values['telefone'] . '</td>';
                        echo '<td>' . $values['tipo'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
    </main>
    <script src="../JS/controleMenu.js"></script>
</body>
</html>