<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div id="messages">
            <?php //sessão vindo de registerProvides.php
                if (isset($_SESSION['register-provide-ok'])): ?>
                    <div class="message-confirm">
                        Confirmação: Cadastro realizado com sucesso!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['register-provide-ok']); ?>

            <?php //sessão vindo de registerProvides.php
                if (isset($_SESSION['register-provide-fail'])): ?>
                    <div class="message-error">
                        Erro: Não foi possível realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['register-provide-fail']); ?>

            <?php //sessão vindo de registerProvides.php
                if (isset($_SESSION['missing-values-provide'])): ?>
                    <div class="message-warning">
                        Atenção: Dados insuficientes para realizar o cadastro!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['missing-values-provide']); ?>

            <?php //sessão vindo de registerProvides.php
                if (isset($_SESSION['provide-exists'])): ?>
                    <div class="message-warning">
                        Atenção: O curso já é fornecido por outra empresa!
                        <span class="btn-close-message" onclick="closeMessage(event);">&times;</span>
                    </div>
            <?php endif; unset($_SESSION['provide-exists']); ?>
        </div>

        <div class="form-provides">
            <h1>Fornecimento</h1>
            <form action="registerProvides.php" method="POST">
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
    <script src="../JS/controleMenu.js"></script>
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
</body>
</html>