<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '../model/Company.php';

$dao = new DaoCompany();

$name = trim(filter_input(INPUT_POST, 'name_company'));
$cnpj = trim(filter_input(INPUT_POST, 'cnpj_company'));
$email = trim(filter_input(INPUT_POST, 'email_company'));
$telephone = trim(filter_input(INPUT_POST, 'tel_company'));
$description = trim(filter_input(INPUT_POST, 'description_company'));

$return = [];

if ($name && $cnpj && $email && $telephone && $description) {
    $list = $dao->checkRepeatedCnpj($cnpj); //faz a busca no banco se o cnpj enviado ja exite
    $total_cnpj = $list[0];

    if ($total_cnpj['total_cnpj'] == 1) { //se retorna 1, o cnpj já existe 
        //$_SESSION['cnpj-exists'] = true;
        //header('Location: formAddCompany.php');
        $return = ['status' => 'warning', 'message' => 'Atenção: O Cnpj informado já existe, 
        escolha outro e tente novamente!'];
        //exit();
    } else {
        $obj = new Company(null, $name, $cnpj, $email, $telephone, $description);
    
        if ($dao->insertCompany($obj)) {
            /*$_SESSION['registration-ok'] = true;
            header('Location: formAddCompany.php');
            exit();*/
            $return = ['status' => 'ok', 'message' => 'Confirmação: Cadastro realizado com sucesso!'];
        } else {
            /*$_SESSION['registration-fail'] = true;
            header('Location: formAddCompany.php');
            exit();*/
            $return = ['status' => 'error', 'message' => 'Erro: Não foi possível cadastrar!'];
        }
    }
} else {
    /*$_SESSION['registration-missing-values'] = true;
    header('Location: formAddCompany.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para realizar o cadastro!'];
}

echo json_encode($return);