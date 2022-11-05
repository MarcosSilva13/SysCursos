<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css"/>
    <link rel="stylesheet" href="CSS/messages.css">
    <title>Login</title>
</head>
<body>
    <section class="area-login">
        <div class="login">
            <div>
                <h1>SysCursos</h1>
                <!--<img src="imagens/SysCursos.png">-->
            </div>
            <div id="messages">
                <?php if (isset($_SESSION['nao_autenticado'])): ?>
                    <div class="message-error">
                        Erro: Usuário ou senha inválidos.
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
                    <?php endif; unset($_SESSION['nao_autenticado']); ?>
            </div>

            <form action="login.php" method="POST">
                <label for="usuario">Usuário ou email</label>
                <input type="text" name="user" autofocus required> 
                <label for="senha">Senha</label>
                <input type="password" name="password" required>
                <input type="submit" id="send-data-login" value="entrar"> 
            </form>
            <p>Ainda não tem uma conta?<a class="logar" href="view/formAddUser.php">Criar conta</a></p>
        </div>
    </section>
    <?php require_once 'view/footer.php'; ?>
    <script src="JS/messages.js"></script>
</body>
</html>