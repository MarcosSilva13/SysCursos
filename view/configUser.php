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
    <link rel="stylesheet" href="../CSS/configUser.css">
    <title>Configuração</title>
</head>
<body>
    <?php require_once 'menuDefault.php'; ?>
    <main id="content">
        <div class="user-config">
            <a class="edit-user" href="formEditUser.php">Editar conta</a>
            <a class="delete-user" onclick="confirmDelete('Deseja realmente deletar sua conta?', '../deleteUser.php');">Deletar conta</a>
        </div>
    </main>
    <?php require_once 'footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/User/deleteAccount.js"></script>
</body>
</html>