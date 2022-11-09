<?php
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';
require_once 'model/Users.php';

$dao = new DaoUser();

//valores vindo de formEditUser.php
$id_user = trim(filter_input(INPUT_POST, 'id_user'));
$login = trim(filter_input(INPUT_POST, 'login_user'));
$name = trim(filter_input(INPUT_POST, 'name_user'));
$cpf = trim(filter_input(INPUT_POST, 'cpf_user'));
$email = trim(filter_input(INPUT_POST, 'email_user'));
$password = trim(filter_input(INPUT_POST, 'password_user'));
$telephone = trim(filter_input(INPUT_POST, 'tel_user'));

$bd_pass = trim(filter_input(INPUT_POST, 'bd_pass'));

$return = [];

if ($id_user && $login && $name && $cpf && $email && $password && $telephone) {
    if ($password != $bd_pass) { //verifica se a senha teve alteração para criptografar denovo
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    $obj = new Users($id_user, $login, $name, $cpf, $email, $password, $telephone, null);

    if ($dao->updateUser($obj) > 0) {
        /*$_SESSION['update-user-ok'] = true; // sessão para notificação de atualização
        header('Location: view/formEditUser.php');
        exit();*/
        $return = ['status' => 'ok', 'message' => 'Confirmação: Dados atualizados com sucesso!'];
    } else {
        /*$_SESSION['update-user-not-ok'] = true;
        header('Location: view/formEditUser.php');
        exit();*/
        $return = ['status' => 'error', 'message' => 'Erro: Não foi possível atualizar os dados!'];
    }
} else {
    /*$_SESSION['missing-values-user'] = true; // sessão para notificação de valores faltando
    header('Location: view/formEditUser.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para atualizar!'];
}

echo json_encode($return);
