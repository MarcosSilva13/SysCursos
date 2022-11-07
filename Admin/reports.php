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
    <title>Relatórios</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <table id="tab">
                <tr>
                    <th>Nº Venda</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Curso</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Pagamento</th>
                </tr>

                <?php 
                    require_once '../dao/DaoReports.php';
                    $dao = new DaoReports();

                    $list = $dao->listReports();

                    foreach ($list as $values) {
                        $date = new DateTime($values['data'], new DateTimeZone('America/Sao_Paulo'));
                        echo '<tr>';
                        echo '<td>' . $values['num_venda'] . '</td>';
                        echo '<td>' . $date->format('d-m-Y') . '</td>';
                        echo '<td>' . $values['usuario'] . '</td>';
                        echo '<td>' . $values['curso'] . '</td>';
                        echo '<td>' . $values['empresa'] . '</td>';
                        echo '<td>' . $values['valor'] . '</td>';
                        echo '<td>' . $values['pagamento'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
    </main>
    <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
</body>
</html>