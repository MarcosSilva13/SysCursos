<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';
require_once 'model/Users.php';

$dao = new DaoUser();

$login = filter_input(INPUT_POST, 'login-user');
$nome = filter_input(INPUT_POST, 'name-user');
$cpf = filter_input(INPUT_POST, 'cpf-user');
$email = filter_input(INPUT_POST, 'email-user');
$senha = filter_input(INPUT_POST, 'password-user');
$telefone = filter_input(INPUT_POST, 'tel-user');

$list_login = $dao->checkRepeatedLogin($login); //faz a busca no banco se o login enviado ja exite
$total_login = $list_login[0];

$list_cpf = $dao->checkRepeatedCpf($cpf);
$total_cpf = $list_cpf[0];

if ($total_login['total_login'] == 1) { //se retornar o total de 1, o login já existe, senão o usuario é cadastrado
    $_SESSION['user-exists'] = true;
    header('Location: view/formAddUser.php');
    exit();
} else if ($total_cpf['total_cpf'] == 1) {
    $_SESSION['cpf-exists'] = true;
    header('Location: view/formAddUser.php');
    exit();
}

if ($login && $nome && $cpf && $email && $senha && $telefone) {
    $obj = new Users(null, $login, $nome, $cpf, $email, $senha, $telefone, null);
    //$dao = new DaoUser();

    if ($dao->insertUser($obj)) {
        $_SESSION['status-registration'] = true;
        header('Location: view/formAddUser.php');
        exit();
    } 
}
