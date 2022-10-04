<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include 'dao/Connection.php';
include 'dao/DaoUser.php';
include 'model/Users.php';

$login = filter_input(INPUT_POST, 'login-user');
$nome = filter_input(INPUT_POST, 'name-user');
$cpf = filter_input(INPUT_POST, 'cpf-user');
$email = filter_input(INPUT_POST, 'email-user');
$senha = filter_input(INPUT_POST, 'password-user');
$telefone = filter_input(INPUT_POST, 'tel-user');

$sql = 'select count(*) as total from usuarios where login = ?;';
$pst = Connection::getPreparedStatement($sql);
$pst->bindValue(1, $login);
$pst->execute();
$row = $pst->fetchAll(PDO::FETCH_ASSOC);

if ($row[0]['total'] == 1) {
    $_SESSION['usuario-existe'] = true;
    header('Location: view/formAddUser.php');
    //header('Location: registration.php');
    exit();
} 

if ($login && $nome && $cpf && $email && $senha && $telefone) {
    $obj = new Users(null, $login, $nome, $cpf, $email, $senha, $telefone, null);
    $dao = new DaoUser();

    if ($dao->insertUser($obj)) {
        $_SESSION['status-cadastro'] = true;
        header('Location: view/formAddUser.php');
        exit();
    } 
}

?>
</body>
</html>
