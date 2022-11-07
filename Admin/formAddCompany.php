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
    <link rel="stylesheet" href="../CSS/formStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cadastro - Empresas</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php' ?>
    <main id="content">
        <div id="messages">
            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['registration-ok'])): ?>
                    <div class="message-confirm">
                        Confirmação: Cadastro realizado com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['registration-ok']); ?>

            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['registration-fail'])): ?>
                    <div class="message-error">
                        Erro: Não foi possivel realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['registration-fail']); ?>

            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['registration-missing-values'])): ?>
                    <div class="message-warning">
                        Atenção: Dados insuficientes para realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['registration-missing-values']); ?>

            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['cnpj-exists'])): ?>
                <div class="message-warning">
                    Atenção: O Cnpj informado já existe, escolha outro e tente novamente!
                    <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                </div>
            <?php endif; unset($_SESSION['cnpj-exists']); ?>
        </div>

        <div class="area-form-company">
            <div class="form-company">
                <h1>Cadastro de Empresa</h1>
                <form action="registerCompany.php" method="POST">
                    <div class="form-fields">
                        <div class="div-nome">
                            <label for="name">Nome</label>
                            <input type="text" name="name-company" id="name-company" placeholder="Nome da empresa" required>
                        </div>
                        <div class="div-cnpj">
                            <label for="cnpj">CNPJ</label>
                            <input oninput="mascara(this, 'cnpj')" type="text" name="cnpj-company" id="cnpj-company" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}" 
                            placeholder="Ex: XX.XXX.XXX/XXXX-XX" required>
                        </div>
                        <div class="div-email">
                            <label for="email">Email</label>
                            <input type="email" name="email-company" id="email-company" placeholder="Ex: empresa123@gmail.com" required>
                        </div>
                        <div class="div-tel">
                            <label for="telephone">Telefone</label>
                            <input oninput="mascara(this, 'tele')" type="tel" name="tel-company" id="tel-company" 
                            pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="Ex: XX-XXXXX-XXXX" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descrição</label>
                            <textarea name="description-company" id="description-company" cols="30" rows="2" placeholder="Descrição da empresa..." required></textarea>
                        </div>
                    </div>
                    <div class="botao-enviar">
                        <input type="submit" id="send-data" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>