<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCompany.php';
require_once '../model/Company.php';

$dao = new DaoCompany();

$name = filter_input(INPUT_POST, 'name-company');
$email = filter_input(INPUT_POST, 'email-company');
$telephone = filter_input(INPUT_POST, 'tel-company');
$description = filter_input(INPUT_POST, 'description-company');

if ($name && $email && $telephone && $description) {
    $obj = new Company(null, $name, $email, $telephone, $description);

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