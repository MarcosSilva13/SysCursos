<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/formAddCompany.css">
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
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-ok']); ?>

            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['registration-fail'])): ?>
                    <div class="message-error">
                        Erro: Não foi possivel realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-fail']); ?>

            <?php //sessão vindo de registerCompany.php
                if (isset($_SESSION['registration-missing-values'])): ?>
                    <div class="message-warning">
                        Atenção: Dados insuficientes para realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-missing-values']); ?>
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
                        <div class="div-email">
                            <label for="email">Email</label>
                            <input type="email" name="email-company" id="email-company" placeholder="Ex: empresa123@gmail.com" required>
                        </div>
                        <div class="div-tel">
                            <label for="telephone">Telefone</label>
                            <input oninput="mascarat(this, 'tele')" type="tel" name="tel-company" id="tel-company" 
                            pattern="[(0-9)]{4}[0-9]{5}-[0-9]{4}" placeholder="Ex: (01)91234-5678" maxlength="14" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descrição</label>
                            <textarea name="description-company" id="description-company" cols="30" rows="2" placeholder="Descrição da empresa..." required></textarea>
                        </div>
                    </div>
                    <div class="botao-enviar">
                        <input type="submit" id="send-data-company" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>