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
    <title>Relatórios</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <div class="div-search-bar">
            <form id="form-search" class="form-search" action="../listReports.php" method="POST">
                <input id="search" class="search-bar" type="text" name="search" placeholder="Pesquisando por...">
                <select class="tipo" name="tipo" id="tipo" required>
                    <option value="">Pesquisar por...</option>
                    <option value="all">Listar Todos</option>
                    <option value="data">Data</option>
                    <option value="usuario">Cliente</option>
                    <option value="curso">Curso</option>
                    <option value="empresa">Fornecedor</option>
                    <option value="valor">Valor</option>
                    <option value="pagamento">Pagamento</option>
                </select>
                <input class="submit" type="submit" name="submit" id="enviar" value="Pesquisar">
            </form>
        </div>

        <table id="tab">

            <div id="messages"></div>
            
                <tr>
                    <th>Nº Venda</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Curso</th>
                    <th>Fornecedor</th>
                    <th>Valor</th>
                    <th>Pagamento</th>
                    <th>Ações</th>
                </tr>

                <tbody id="dados">

                <?php
                    require_once '../dao/DaoReports.php';
                    $dao = new DaoReports();
                    $list = $dao->listReports();

                    foreach ($list as $values) {
                        $date = new DateTime($values['data'], new DateTimeZone('America/Sao_Paulo'));
                        echo '<tr>';
                        echo '<td>' . $values['num_venda'] . '</td>';
                        echo '<td>' . $date->format('d/m/Y') . '</td>';
                        echo '<td>' . $values['usuario'] . '</td>';
                        echo '<td>' . $values['curso'] . '</td>';
                        echo '<td>' . $values['empresa'] . '</td>';
                        echo '<td>' . $values['valor'] . '</td>';
                        echo '<td>' . $values['pagamento'] . '</td>';
                        echo '<td>
                            <form id="form-reports" action="" method="POST">
                            <input type="hidden" name="id_reports" id="id_reports" value="' . $values['id_relatorio'] . '"/>
                            <input type="submit" id="cancel" value="Excluir"/>
                            </form></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </main>
        <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Relatorios/search.js"></script>
    <script src="../JS/Relatorios/deleteReport.js"></script>
</body>
</html>