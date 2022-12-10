<!DOCTYPE html>
<html lang="pt-br">
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

    <link rel="stylesheet" href="../CSS/estilo.css"/>
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cadastro - Usuário</title>
</head>
<body>
    <div class="area-form-user">
        <div class="form-user">
            <h1>Cadastro</h1>

            <div id="messages"></div>
            
            <form id="form-add-user" action="../registration.php" method="POST">
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
    <script src="../JS/User/addUser.js"></script>
</body>
</html>
