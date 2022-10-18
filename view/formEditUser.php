<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/formEditUser.css">
    <title>Editar Conta</title>
</head>
<body>
    <?php include 'menuDefault.php'; 
        require_once '../dao/DaoUser.php';
        
        $id_user = $_SESSION['id_user']; // valor vindo da sessão em login.php

        $dao = new DaoUser();
        $list = $dao->findUser($id_user);
        $values = $list[0];
    ?>
        <main id="content">
            <div class="area-form-user">
                <div class="form-user">
                    <h1>Editar Dados</h1>
                    <form action="../editUser.php" method="POST">
                        <input type="hidden" name="id-user" id="id-user" value="<?= $values['id_usuario']?>"/>
                        <div class="form-fields">
                            <div class="div-login">
                                <label for="login">Login</label>
                                <input type="text" name="login-user" id="login-user" placeholder="Ex: MarcosSilva25" value="<?= $values['login']?>" required>
                            </div>
                            <div class="div-nome">
                                <label for="name">Nome</label>
                                <input type="text" name="name-user" id="name-user" placeholder="Seu nome completo" value="<?= $values['nome']?>" required>
                            </div>
                            <div class="div-cpf">
                                <label for="cpf">CPF</label>
                                <input oninput="mascara(this, 'cpf')" type="text" name="cpf-user" id="cpf-user" 
                                pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="Ex: 123.456.789-10" value="<?= $values['cpf']?>" required>
                            </div>
                            <div class="div-email">
                                <label for="email">Email</label>
                                <input type="email" name="email-user" id="email-user" placeholder="Ex: syscursos@gmail.com" value="<?= $values['email']?>" required>
                            </div>
                            <div class="div-senha">
                                <label for="password">Senha</label>
                                <input type="password" name="password-user" id="password-user" placeholder="Sua senha" value="<?= $values['senha']?>" required>
                            </div>
                            <div class="div-tel">
                                <label for="telephone">Telefone</label>
                                <input oninput="mascarat(this, 'tele')" type="tel" name="tel-user" id="tel-user" 
                                pattern="[(0-9)]{4}[0-9]{5}-[0-9]{4}" placeholder="Ex: (01)91234-5678" maxlength="14" value="<?= $values['telefone']?>" required>
                            </div>
                        </div>
                        <div class="botao-enviar">
                            <input type="submit" id="send-data-user" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
</body>
</html>