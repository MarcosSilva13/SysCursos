<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Empresas</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; ?>
    <main id="content">
    <table id="tab">
                <tr>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Descrição</th>
                </tr>

                <?php 
                    require_once '../dao/DaoCompany.php';
                    $dao = new DaoCompany();

                    $list = $dao->listCompany();

                    foreach ($list as $values) {
                        echo '<tr>';
                        echo '<td>' . $values['nome_emp'] . '</td>';
                        echo '<td>' . $values['cnpj'] . '</td>';
                        echo '<td>' . $values['email_emp'] . '</td>';
                        echo '<td>' . $values['telefone_emp'] . '</td>';
                        echo '<td>' . $values['descricao_emp'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
    </main>
    <?php require_once 'footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
</body>
</html>