<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '..//dao/DaoProvide.php';

$daoCompany = new DaoCompany();
$daoProvide = new DaoProvide();

$id_company = filter_input(INPUT_POST, 'id_company');

$list = $daoProvide->checkProvideCompany($id_company);
$total_fornece = $list[0];

if ($total_fornece['total_fornece'] > 0) { //verifica se a empresa está associada a algum curso
    $daoProvide->deleteProvideByCompany($id_company); //remove a ligação da empresa com o curso

    if ($daoCompany->deleteCompany($id_company) > 0) { //remove a empresa
        $_SESSION['delete-company-ok'] = true;
        header('Location: companyAdmin.php');
        exit();
    }
} else { //se não tiver ligação remove a empresa
    if ($daoCompany->deleteCompany($id_company) > 0) {
        $_SESSION['delete-company-ok'] = true;
        header('Location: companyAdmin.php');
        exit();
    }
}