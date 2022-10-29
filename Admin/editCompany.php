<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '../model/Company.php';

$dao = new DaoCompany();

$id_company = filter_input(INPUT_POST, 'id-company');
$name = filter_input(INPUT_POST, 'name-company');
$cnpj = filter_input(INPUT_POST, 'cnpj-company');
$email = filter_input(INPUT_POST, 'email-company');
$telephone = filter_input(INPUT_POST, 'tel-company');
$description = filter_input(INPUT_POST, 'description-company');

if ($id_company && $name && $cnpj && $email && $telephone && $description) {
    $obj = new Company($id_company, $name, $cnpj, $email, $telephone, $description);

    if ($dao->updateCompany($obj) > 0) {
        $_SESSION['update-company-ok'] = true;
        header('Location: companyAdmin.php');
        exit();
    } else {
        $_SESSION['update-company-fail'] = true;
        header('Location: companyAdmin.php');
        exit();
    }
} else {
    $_SESSION['missing-company-values'] = true;
    header('Location: companyAdmin.php');
    exit();
}