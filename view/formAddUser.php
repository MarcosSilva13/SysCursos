<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css"/>
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cadastro - Usuário</title>
</head>
<body>
    <div class="area-form-user">
        <div class="form-user">
            <h1>Cadastro</h1>
            <div id="messages">
                <?php //sessão vindo de registration.php
                    if (isset($_SESSION['status-registration'])): 
                ?>
                    <div class="message-confirm">
                        Confirmação: Cadastro efetuado com sucesso!<span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                        Faça login informando seu usuário e senha <a href="../index.php">aqui</a>.
                    </div>
                <?php 
                    endif; unset($_SESSION['status-registration']); ?>

                <?php //sessão vindo de registration.php
                    if (isset(($_SESSION['user-exists']))):  
                ?>
                    <div class="message-warning">
                        Atenção: O usuário escolhido já existe.
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
                <?php
                    endif; unset($_SESSION['user-exists']); ?>

                <?php //sessão vindo de registration.php
                    if (isset(($_SESSION['cpf-exists']))):  
                ?>
                    <div class="message-warning">
                        Atenção: O cpf informado já esta cadastrado.
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
                <?php
                    endif; unset($_SESSION['cpf-exists']); ?>

                <?php //sessão vindo de registration.php
                    if (isset(($_SESSION['email-exists']))):  
                ?>
                    <div class="message-warning">
                        Atenção: O email informado já esta cadastrado.
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
                <?php
                    endif; unset($_SESSION['email-exists']); ?>

                <?php //sessão vindo de registration.php
                    if (isset($_SESSION['missing-values-registration'])):
                ?>
                    <div class="message-warning">
                        Atenção: Dados insuficientes para realizar cadastro.
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
                <?php endif; unset($_SESSION['missing-values-registration']); ?>
            </div>
            <form action="../registration.php" method="POST">
                <div class="form-fields">
                    <div class="div-login">
                        <label for="login">Login</label>
                        <input type="text" name="login_user" id="login_user" placeholder="Ex: MarcosSilva25" required>
                    </div>
                    <div class="div-nome">
                        <label for="name">Nome</label>
                        <input type="text" name="name_user" id="name_user" placeholder="Seu nome completo" required>
                    </div>
                    <div class="div-cpf">
                        <label for="cpf">CPF</label>
                        <input oninput="mascara(this, 'cpf')" type="text" name="cpf_user" id="cpf_user" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex: XXX.XXX.XXX-XX" required>
                    </div>
                    <div class="div-email">
                        <label for="email">Email</label>
                        <input type="email" name="email_user" id="email_user" placeholder="Ex: syscursos@gmail.com" required>
                    </div>
                    <div class="div-senha">
                        <label for="password">Senha</label>
                        <input type="password" name="password_user" id="password_user" placeholder="Sua senha" required>
                    </div>
                    <div class="div-tel">
                        <label for="telephone">Telefone</label>
                        <input oninput="mascara(this, 'tele')" type="tel" name="tel_user" id="tel_user" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="Ex: XX-XXXXX-XXXX" required>
                    </div>
                </div>
                <div class="botao-enviar">
                    <input type="submit" id="send-data-user" value="Enviar">
                </div>
            </form>
            <p>Já tem uma conta?<a class="logar" href="../index.php">Login</a></p>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
    <!-- JavaScript -->
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
    <!--<script src="../JS/addUser.js"></script>-->
</body>
</html>
