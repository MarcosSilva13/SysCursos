<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/configUser.css">
    <title>Configuração</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        <div class="user-config">
            <a class="edit-user" href="../view/formEditUser.php">Editar conta</a>
            <a class="add-course" href="formAddCourses.php">Cadastrar Curso</a>
            <a class="add-company" href="formAddCompany.php">Cadastrar Empresa</a>
            <a class="add-provider" href="#">Cadastrar Fornecimento</a>
            <a class="delete-user" href="../deleteUser.php">Deletar conta</a>
        </div>
    </main>

    <script src="../JS/controleMenu.js"></script>
</body>
</html>