<?php
require_once 'dao/Connection.php';
require_once 'dao/DaoUser.php';
require_once 'model/Users.php';

$dao = new DaoUser();
//valores vindo de formAddUser.php
$login = trim(filter_input(INPUT_POST, 'login_user'));
$name = trim(filter_input(INPUT_POST, 'name_user'));
$cpf = trim(filter_input(INPUT_POST, 'cpf_user'));
$email = trim(filter_input(INPUT_POST, 'email_user'));
$password = trim(filter_input(INPUT_POST, 'password_user'));
$telephone = trim(filter_input(INPUT_POST, 'tel_user'));

$return = [];

if ($login && $name && $cpf && $email && $password && $telephone) {
    $list_login = $dao->checkRepeatedLogin($login); //faz a busca no banco se o login enviado ja exite
    $total_login = $list_login[0];

    $list_cpf = $dao->checkRepeatedCpf($cpf); //faz a busca no banco se o cpf enviado ja exite
    $total_cpf = $list_cpf[0];

    $list_email = $dao->checkRepeatedEmail($email); //faz a busca no banco se o email enviado ja exite
    $total_email = $list_email[0];

    if ($total_login['total_login'] == 1) { //se retornar o total de 1, o login já existe, senão o usuario é cadastrado
        /*$_SESSION['user-exists'] = true;
        header('Location: view/formAddUser.php');
        exit();*/
        $return = ['status' => 'warning', 'message' => 'Atenção: O usuário escolhido ja existe!'];
    } else if ($total_cpf['total_cpf'] == 1) {
        /*$_SESSION['cpf-exists'] = true;
        header('Location: view/formAddUser.php');
        exit();*/
        $return = ['status' => 'warning', 'message' => 'Atenção: O cpf informado já esta cadastrado!'];
    } else if ($total_email['total_email'] == 1) {
        /*$_SESSION['email-exists'] = true;
        header('Location: view/formAddUser.php');
        exit();*/
        $return = ['status' => 'warning', 'message' => 'Atenção: O email informado já esta cadastrado!'];
    } else {
        $password_crip = password_hash($password, PASSWORD_DEFAULT);
    
        $obj = new Users(null, $login, $name, $cpf, $email, $password_crip, $telephone, null);
    
        if ($dao->insertUser($obj)) {
           /*$_SESSION['status-registration'] = true;
            header('Location: view/formAddUser.php');
            exit();*/
            $return = ['status' => 'ok', 'message' => 'Confirmação: Cadastro efetuado com sucesso!'];
        } else {
            $return = ['status' => 'error', 'message' => 'Erro: Não foi possível realizar o cadastro!'];
        }
    }
} else {
    /*$_SESSION['missing-values-registration'] = true;
    header('Location: view/formAddUser.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para realizar o cadastro!'];
}

echo json_encode($return);