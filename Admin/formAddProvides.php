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
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <link rel="stylesheet" href="../CSS/formProvides.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <title>Fornecimento</title>
</head>
<body>
    <?php 
        require_once '../view/menuDefault.php';
        require_once '../dao/DaoCompany.php';
        require_once '../dao/DaoCourses.php';
        
        $daoCompany = new DaoCompany();
        $listCompany = $daoCompany->listCompany();

        $daoCourse = new DaoCourses();
        $listCourse = $daoCourse->listCourseDefault();
    ?>
    <main id="content">
        
        <div id="messages"></div>

        <div class="form-provides">
            <h1>Fornecimento</h1>
            <form id="form-add-provide" action="registerProvides.php" method="POST">
                <div class="form-fields">
                    <div class="company">
                        <label for="company">Empresa:</label>
                        <select name="company" id="company" autofocus required>
                            <option value="">Selecione uma empresa</option>
                            <?php foreach($listCompany as $company) {
                                echo '<option value="' . $company['id_empresa'] . '">' . $company['nome_emp'] .'';
                            } ?>
                        </select>
                    </div>
                    <div class="course">
                        <label for="course">Curso:</label>
                        <select name="course" id="course" required>
                            <option value="">Selecione um curso</option>
                            <?php foreach($listCourse as $course) {
                                echo '<option value="' . $course['id_curso'] . '">' . $course['nome_curso'] . '';
                            } ?>
                        </select>
                    </div>
                    <div class="btn-register">
                        <input id="btn-reg" type="submit" value="Registrar">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require_once '../view/footer.php'; ?>
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Provide/addProvide.js"></script>
</body>
</html>