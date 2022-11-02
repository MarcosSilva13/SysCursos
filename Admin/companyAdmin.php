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
    <title>Empresas</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <div id="messages">
            <?php //sessão vindo de editCompany.php
                if (isset($_SESSION['update-company-ok'])): ?>
                    <div class="message-confirm">
                        Confirmação: Empresa atualizada com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['update-company-ok']); ?>

            <?php //sessão vindo de editCompany.php
                if (isset($_SESSION['update-company-fail'])): ?>
                    <div class="message-warning">
                        Atenção: É preciso modificar pelo menos um dos campos!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['update-company-fail']); ?>

            <?php //sessão vindo de editCompany.php
                if (isset($_SESSION['missing-company-values'])): ?>
                    <div class="message-error">
                        Erro: Algum campo não foi preenchido corretamente!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['missing-company-values']); ?>

            <?php //sessão vindo de deleteCompany.php
                if (isset($_SESSION['delete-company-ok'])): ?>
                <div class="message-confirm">
                    Confirmação: Empresa removida com sucesso!
                    <span class="btn-close-message" onclick="closeMessage(event)">&times;</span>
                </div>
            <?php endif; unset($_SESSION['delete-company-ok']);?>
        </div>

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
                        echo '<td> <form action="deleteCompany.php" method="POST">
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
</body>
</html>