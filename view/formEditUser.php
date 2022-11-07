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
    <link rel="stylesheet" href="../CSS/formStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Editar Conta</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; 
        require_once '../dao/DaoUser.php';
        
        $id_user = $_SESSION['id_user']; // valor vindo da sessão em login.php

        $dao = new DaoUser();
        $list = $dao->findUser($id_user);
        $values = $list[0];
    ?>
        <main id="content">
            <div id="messages">
                <?php //sessão vindo de EditUser.php
                    if (isset($_SESSION['update-user-ok'])): ?>
                        <div class="message-confirm">
                            Confirmação: Dados atualizados com sucesso!<span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                            Por favor faça login novamente clicando <a href="../logout.php">aqui</a>
                            
                        </div>
                <?php endif; unset($_SESSION['update-user-ok']); ?>

                <?php //sessão vindo de EditUser.php
                    if (isset($_SESSION['update-user-not-ok'])): ?>
                        <div class="message-warning">
                            Atenção: É preciso modificar pelo menos um dos campos!
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>
                <?php endif; unset($_SESSION['update-user-not-ok']); ?>

                <?php //sessão vindo de EditUser.php
                    if (isset($_SESSION['missing-values-user'])): ?>
                        <div class="message-error">
                            Erro: Dados insuficientes para atualizar!
                            <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                        </div>
                <?php endif; unset($_SESSION['missing-values-user']); ?>
            </div>

            <div class="area-form-user">
                <div class="form-user">
                    <h1>Editar Dados</h1>
                    <form action="../editUser.php" method="POST">
                        <input type="hidden" name="id-user" id="id-user" value="<?= $values['id_usuario']?>">
                        <input type="hidden" name="bd-pass" id="bd-pass" value="<?= $values['senha']?>">
                        <div class="form-fields">
                            <div class="div-login">
                                <label for="login">Login</label>
                                <input type="text" name="login-user" id="login-user" placeholder="Ex: MarcosSilva25" value="<?= $values['login']?>" readonly>
                            </div>
                            <div class="div-nome">
                                <label for="name">Nome</label>
                                <input type="text" name="name-user" id="name-user" placeholder="Seu nome completo" value="<?= $values['nome']?>" required>
                            </div>
                            <div class="div-cpf">
                                <label for="cpf">CPF</label>
                                <input oninput="mascara(this, 'cpf')" type="text" name="cpf-user" id="cpf-user" 
                                pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex: XXX.XXX.XXX-XX" value="<?= $values['cpf']?>" readonly>
                            </div>
                            <div class="div-email">
                                <label for="email">Email</label>
                                <input type="email" name="email-user" id="email-user" placeholder="Ex: syscursos@gmail.com" value="<?= $values['email']?>" readonly>
                            </div>
                            <div class="div-senha">
                                <label for="password">Senha</label>
                                <input type="password" name="password-user" id="password-user" placeholder="Sua senha" value="<?= $values['senha']?>" required>
                            </div>
                            <div class="div-tel">
                                <label for="telephone">Telefone</label>
                                <input oninput="mascara(this, 'tele')" type="tel" name="tel-user" id="tel-user" 
                                pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="Ex: XX-XXXXX-XXXX" value="<?= $values['telefone']?>" required>
                            </div>
                        </div>
                        <div class="botao-enviar">
                            <input type="submit" id="send-data" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php require_once 'footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>