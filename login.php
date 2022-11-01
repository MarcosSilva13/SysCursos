<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';

if (empty($_POST['user']) || empty($_POST['password'])) {
    header('Location: index.php');
    exit();
}

$dao = new DaoUser();

$user = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'password');

$list = $dao->login($user, $password);
$dataUser = $list[0];

if ($dataUser['login'] != null) { // se não for nulo um usuario foi encontrado e será logado

    $_SESSION['id_user'] = $dataUser['id_usuario'];
    $_SESSION['usuario'] = $dataUser['nome'];
    $_SESSION['login_user'] = $dataUser['login'];
    $_SESSION['cpf_user'] = $dataUser['cpf'];
    $_SESSION['email_user'] = $dataUser['email'];
    $_SESSION['type_user'] = $dataUser['tipo'];

    if ($dataUser['tipo'] == "administrador") {
        header('Location: Admin/coursesAdmin.php');
        exit();
    } else {
        header('Location: view/coursesDefault.php');
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}