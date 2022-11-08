<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '../model/Company.php';

$dao = new DaoCompany();

$id_company = trim(filter_input(INPUT_POST, 'id_company'));
$name = trim(filter_input(INPUT_POST, 'name_company'));
$cnpj = trim(filter_input(INPUT_POST, 'cnpj_company'));
$email = trim(filter_input(INPUT_POST, 'email_company'));
$telephone = trim(filter_input(INPUT_POST, 'tel_company'));
$description = trim(filter_input(INPUT_POST, 'description_company'));

$return = [];

if ($id_company && $name && $cnpj && $email && $telephone && $description) {
    $obj = new Company($id_company, $name, $cnpj, $email, $telephone, $description);

    if ($dao->updateCompany($obj) > 0) {
        /*$_SESSION['update-company-ok'] = true;
        header('Location: companyAdmin.php');
        exit();*/
        $return = ['status' => 'ok', 'message' => 'Confirmação: Dados atualizados com sucesso!'];

    } else {
        /*$_SESSION['update-company-fail'] = true;
        header('Location: companyAdmin.php');
        exit();*/
        $return = ['status' => 'error', 'message' => 'Erro: Não foi possível atualizar os dados!'];
    }
} else {
    /*$_SESSION['missing-company-values'] = true;
    header('Location: companyAdmin.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para atualizar!'];
}

echo json_encode($return);