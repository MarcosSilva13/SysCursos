<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once '../dao/DaoUser.php';
    require_once '../model/Users.php';

    $login = filter_input(INPUT_POST, 'login-user');
    $nome = filter_input(INPUT_POST, 'name-user');
    $cpf = filter_input(INPUT_POST, 'cpf-user');
    $email = filter_input(INPUT_POST, 'email-user');
    $senha = filter_input(INPUT_POST, 'password-user');
    $telefone = filter_input(INPUT_POST, 'tel-user');

    echo "$login<br> $nome<br> $cpf<br> $email<br> $senha<br> $telefone";

    if ($login && $nome && $cpf && $email && $senha && $telefone) {
        $obj = new Users(null, $login, $nome, $cpf, $email, $senha, $telefone, null);
        $dao = new DaoUser();

        if ($dao->insertUser($obj)) {
            echo '<h3> Dados cadastrados com successo!</h3>';
        } else {
            echo '<h3> Deu erro!</h3>';
        }
    } else {
        echo '<h3> Dados ausentes ou incorretos!</h3>';
    }

?>
</body>
</html>
