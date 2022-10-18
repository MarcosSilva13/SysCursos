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
    <title>Cadastro - Usuário</title>
</head>
<body>
    <div class="area-form-user">
        <div class="form-user">
            <h1>Cadastro</h1>

            <?php //sessão criada em registration.php
                if (isset($_SESSION['status-registration'])): 
            ?>
            <div class="notification-success">
                <p>Cadastro efetuado com sucesso!</p>
                <p>Faça login informando seu usuário e senha <a href="../index.php">aqui</a>.</p>
            </div>
            <?php 
                endif; 
                unset($_SESSION['status-registration']);
            ?>

            <?php //sessão criada em registration.php
                if (isset(($_SESSION['user-exists']))):  
            ?>
            <div class="notification-info">
                <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['user-exists']);
            ?>
            <form action="../registration.php" method="POST">
                <!--<label for="id">Id</label>
                <input type="text" name="id-user" id="id-user"/>-->
                <div class="form-fields">
                    <div class="div-login">
                        <label for="login">Login</label>
                        <input type="text" name="login-user" id="login-user" placeholder="Ex: MarcosSilva25" required>
                    </div>
                    <div class="div-nome">
                        <label for="name">Nome</label>
                        <input type="text" name="name-user" id="name-user" placeholder="Seu nome completo" required>
                    </div>
                    <div class="div-cpf">
                        <label for="cpf">CPF</label>
                        <input oninput="mascara(this, 'cpf')" type="text" name="cpf-user" id="cpf-user" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex: 123.456.789-10" required>
                    </div>
                    <div class="div-email">
                        <label for="email">Email</label>
                        <input type="email" name="email-user" id="email-user" placeholder="Ex: syscursos@gmail.com" required>
                    </div>
                    <div class="div-senha">
                        <label for="password">Senha</label>
                        <input type="password" name="password-user" id="password-user" placeholder="Sua senha" required>
                    </div>
                    <div class="div-tel">
                        <label for="telephone">Telefone</label>
                        <input oninput="mascarat(this, 'tele')" type="tel" name="tel-user" id="tel-user" pattern="[(0-9)]{4}[0-9]{5}-[0-9]{4}" placeholder="Ex: (01)91234-5678" maxlength="14" required>
                    </div>
                </div>
                <div class="botao-enviar">
                    <input type="submit" id="send-data-user" value="Enviar">
                </div>
            </form>
            <p>Já tem uma conta?<a href="../index.php">Login</a></p>
        </div>
    </div>
    <footer>
        <p>Desenvolvido por Marcos Antônio &copy; 2022</p>
    </footer>
    
    <!-- JavaScript -->
    <script src="../JS/mascaraCampos.js"></script>
</body>
</html>
