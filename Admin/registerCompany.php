<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '../model/Company.php';

$dao = new DaoCompany();

$name = trim(filter_input(INPUT_POST, 'name-company'));
$cnpj = trim(filter_input(INPUT_POST, 'cnpj-company'));
$email = trim(filter_input(INPUT_POST, 'email-company'));
$telephone = trim(filter_input(INPUT_POST, 'tel-company'));
$description = trim(filter_input(INPUT_POST, 'description-company'));

if ($name && $cnpj && $email && $telephone && $description) {
    $list = $dao->checkRepeatedCnpj($cnpj); //faz a busca no banco se o cnpj enviado ja exite
    $total_cnpj = $list[0];

    if ($total_cnpj['total_cnpj'] == 1) { //se retorna 1, o cnpj já existe 
        $_SESSION['cnpj-exists'] = true;
        header('Location: formAddCompany.php');
        exit();
    }

    $obj = new Company(null, $name, $cnpj, $email, $telephone, $description);

    if ($dao->insertCompany($obj)) {
        $_SESSION['registration-ok'] = true;
        header('Location: formAddCompany.php');
        exit();
    } else {
        $_SESSION['registration-fail'] = true;
        header('Location: formAddCompany.php');
        exit();
    }
} else {
    $_SESSION['registration-missing-values'] = true;
    header('Location: formAddCompany.php');
    exit();
}