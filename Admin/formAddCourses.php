<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/coursesDefaultStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/formStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cadastro - Cursos</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php' ?>
    <main id="content">
        <div id="messages">
            <?php //sessão vindo de registerCourse.php
                if (isset($_SESSION['registration-ok'])): ?>
                    <div class="message-confirm">
                        Confirmação: Cadastro realizado com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-ok']); ?>

            <?php //sessão vindo de registerCourse.php
                if (isset($_SESSION['registration-fail'])): ?>
                    <div class="message-error">
                        Erro: Não foi possivel realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-fail']); ?>

            <?php //sessão vindo de registerCourse.php
                if (isset($_SESSION['registration-missing-values'])): ?>
                    <div class="message-warning">
                        Atenção: Dados insuficientes para realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span><br>
                    </div>
            <?php endif; unset($_SESSION['registration-missing-values']); ?>
        </div>

        <div class="area-form-course">
            <div class="form-course">
                <h1>Cadastro de Cursos</h1>
                <form action="registerCourse.php" method="POST">
                    <div class="form-fields">
                        <div class="div-nome">
                            <label for="name">Nome</label>
                            <input type="text" name="name-course" id="name-course" placeholder="Nome do curso" required>
                        </div>
                        <div class="div-valor">
                            <label for="valor">Valor</label>
                            <input type="number" name="price-course" id="price-course" placeholder="Ex: 59.90" required>
                        </div>
                        <div class="div-duracao">
                            <label for="duration">Duração</label>
                            <input type="number" name="duration-course" id="duration-course" 
                            placeholder="Duração do curso" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descrição</label>
                            <textarea name="description-course" id="description-course" cols="30" rows="2" placeholder="Descrição da curso..." required></textarea>
                        </div>
                    </div>
                    <div class="botao-enviar">
                        <input type="submit" id="send-data" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>