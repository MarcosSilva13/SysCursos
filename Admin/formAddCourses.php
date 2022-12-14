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
    <link rel="stylesheet" href="../CSS/formStyle.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Cadastro - Cursos</title>
</head>
<body>
    <?php require_once '../view/menuDefault.php'; ?>
    <main id="content">
        
        <div id="messages"></div>

        <div class="area-form-course">
            <div class="form-course">
                <h1>Cadastro de Cursos</h1>
                <form id="form-add-course" action="" method="POST">
                    <div class="form-fields">
                        <div class="div-nome">
                            <label for="name">Nome</label>
                            <input type="text" name="name_course" id="name_course" placeholder="Nome do curso" required>
                        </div>
                        <div class="div-valor">
                            <label for="valor">Valor</label>
                            <input type="number" name="price_course" id="price_course" placeholder="Ex: 59.90" required>
                        </div>
                        <div class="div-duracao">
                            <label for="duration">Dura????o</label>
                            <input type="number" name="duration_course" id="duration_course" 
                            placeholder="Dura????o do curso" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descri????o</label>
                            <textarea name="description_course" id="description_course" cols="30" rows="2" placeholder="Descri????o da curso..." required></textarea>
                        </div>
                    </div>
                    <div class="botao-enviar">
                        <input type="submit" id="send-data" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Courses/addCourse.js"></script>
</body>
</html>