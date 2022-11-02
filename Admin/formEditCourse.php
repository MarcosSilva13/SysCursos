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
    <title>Editar - Curso</title>
</head>
<body>
    <?php 
        require_once '../view/menuDefault.php'; 
        require_once '../dao/DaoCourses.php';

        $dao = new DaoCourses();
        $id_course = filter_input(INPUT_POST, 'id_course'); // valor vindo de coursesAdmin.php
        
        $list = $dao->findCourseById($id_course);
        $values = $list[0];
    ?>

    <main id="content">
        <div class="area-form-course">
            <div class="form-course">
                <h1>Editar Curso</h1>
                <form action="editCourse.php" method="POST">
                    <div class="form-fields">
                        <input type="hidden" name="id-course" id="id-course" value="<?=$id_course?>">
                        <div class="div-nome">
                            <label for="name">Nome</label>
                            <input type="text" name="name-course" id="name-course" placeholder="Nome do curso" value="<?= $values['nome_curso']?>" required>
                        </div>
                        <div class="div-valor">
                            <label for="valor">Valor</label>
                            <input type="number" name="price-course" id="price-course" placeholder="Ex: 59.90" value="<?= $values['valor_curso']?>" required>
                        </div>
                        <div class="div-duracao">
                            <label for="duration">Duração</label>
                            <input type="number" name="duration-course" id="duration-course" 
                            placeholder="Duração do curso" value="<?= $values['duracao_curso'] ?>" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descrição</label>
                            <textarea name="description-course" id="description-course" cols="30" rows="2" placeholder="Descrição da curso..." required><?=$values['descricao_curso']?></textarea>
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
</body>
</html>