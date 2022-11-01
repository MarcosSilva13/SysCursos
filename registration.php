<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';
require_once 'model/Users.php';

$dao = new DaoUser();

//valores vindo de formAddUser.php
$login = filter_input(INPUT_POST, 'login-user');
$name = filter_input(INPUT_POST, 'name-user');
$cpf = filter_input(INPUT_POST, 'cpf-user');
$email = filter_input(INPUT_POST, 'email-user');
$password = filter_input(INPUT_POST, 'password-user');
$telephone = filter_input(INPUT_POST, 'tel-user');

$password_crip = password_hash($password, PASSWORD_DEFAULT);

$list_login = $dao->checkRepeatedLogin($login); //faz a busca no banco se o login enviado ja exite
$total_login = $list_login[0];

$list_cpf = $dao->checkRepeatedCpf($cpf); //faz a busca no banco se o cpf enviado ja exite
$total_cpf = $list_cpf[0];

$list_email = $dao->checkRepeatedEmail($email); //faz a busca no banco se o email enviado ja exite
$total_email = $list_email[0];

if ($total_login['total_login'] == 1) { //se retornar o total de 1, o login já existe, senão o usuario é cadastrado
    $_SESSION['user-exists'] = true;
    header('Location: view/formAddUser.php');
    exit();
} else if ($total_cpf['total_cpf'] == 1) {
    $_SESSION['cpf-exists'] = true;
    header('Location: view/formAddUser.php');
    exit();
} else if ($total_email['total_email'] == 1) {
    $_SESSION['email-exists'] = true;
    header('Location: view/formAddUser.php');
    exit();
}

if ($login && $name && $cpf && $email && $password_crip && $telephone) {
    $obj = new Users(null, $login, $name, $cpf, $email, $password_crip, $telephone, null);

    if ($dao->insertUser($obj)) {
        $_SESSION['status-registration'] = true;
        header('Location: view/formAddUser.php');
        exit();
    } 
}
