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
    <title>Empresas</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        
        <div id="messages"></div>

        <table id="tab">
                <tr>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
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
                        echo '<td> <form action="formEditCompany.php" method="POST">
                                <input type="hidden" name="id_company" id="id_company" value="' . $values['id_empresa'] . '"/>
                                <input type="submit" id="editar" value="Editar"/>
                                </form></td>';
                        echo '<td> <form action="" method="POST">
                                <input type="hidden" name="id_company" id="id_company" value="' . $values['id_empresa'] . '"/>
                                <input type="submit" id="excluir" value="Excluir"/>
                                </form></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
    </main>
    <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Company/deleteCompany.js"></script>
</body>
</html>