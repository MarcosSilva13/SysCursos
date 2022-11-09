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
    <title>Editar - Empresas</title>
</head>
<body>
    <?php 
        require_once '../view/menuDefault.php';
        require_once '../dao/DaoCompany.php';
        
        $dao = new DaoCompany();
        $id_company = filter_input(INPUT_POST, 'id_company');

        $list = $dao->findCompanyById($id_company);
        $values = $list[0];
    ?>
    <main id="content">
        
        <div id="messages"></div>

        <div class="area-form-company">
            <div class="form-company">
                <h1>Editar Empresa</h1>
                <form id="form-edit-company" action="" method="POST">
                    <div class="form-fields">
                        <input type="hidden" name="id_company" id="id_company" value="<?= $id_company ?>">
                        <div class="div-nome">
                            <label for="name">Nome</label>
                            <input type="text" name="name_company" id="name_company" placeholder="Nome da empresa" value="<?= $values['nome_emp'] ?>" required>
                        </div>
                        <div class="div-cnpj">
                            <label for="cnpj">CNPJ</label>
                            <input oninput="mascara(this, 'cnpj')" type="text" name="cnpj_company" id="cnpj_company" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}" 
                            placeholder="Ex: XX.XXX.XXX/XXXX-XX" value="<?= $values['cnpj'] ?>" required readonly>
                        </div>
                        <div class="div-email">
                            <label for="email">Email</label>
                            <input type="email" name="email_company" id="email_company" placeholder="Ex: empresa123@gmail.com" value="<?= $values['email_emp'] ?>" required readonly>
                        </div>
                        <div class="div-tel">
                            <label for="telephone">Telefone</label>
                            <input oninput="mascara(this, 'tele')" type="tel" name="tel_company" id="tel_company" 
                            pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="Ex: XX-XXXXX-XXXX" value="<?= $values['telefone_emp'] ?>" required>
                        </div>
                        <div class="div-desc">
                            <label for="description">Descrição</label>
                            <textarea name="description_company" id="description_company" cols="30" rows="2" placeholder="Descrição da empresa..." required><?= $values['descricao_emp'] ?></textarea>
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
    <script src="../JS/mascaraCampos.js"></script>
    <script src="../JS/messages.js"></script>
    <script src="../JS/Company/editCompany.js"></script>
</body>
</html>