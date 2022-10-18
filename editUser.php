<?php
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';
require_once 'model/Users.php';

$dao = new DaoUser();

$id_user = filter_input(INPUT_POST, 'id-user');
$login = filter_input(INPUT_POST, 'login-user');
$nome = filter_input(INPUT_POST, 'name-user');
$cpf = filter_input(INPUT_POST, 'cpf-user');
$email = filter_input(INPUT_POST, 'email-user');
$senha = filter_input(INPUT_POST, 'password-user');
$telefone = filter_input(INPUT_POST, 'tel-user');

echo "$id_user<br>$login<br>$nome<br>$cpf<br>$email<br>$senha<br>$telefone<br>";

if ($id_user && $login && $nome && $cpf && $email && $senha && $telefone) {
    $obj = new Users($id_user, $login, $nome, $cpf, $email, $senha, $telefone, null);

    if ($dao->updateUser($obj)) {
        echo "Deu certo";
        header('Location: view/coursesDefault.php');
        exit();
    }

} else {
    echo "deu ruim";
}
