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
    $login = filter_input(INPUT_POST, 'login-user');
    $nome = filter_input(INPUT_POST, 'name-user');
    $cpf = filter_input(INPUT_POST, 'cpf-user');
    $email = filter_input(INPUT_POST, 'email-user');
    $senha = filter_input(INPUT_POST, 'password-user');
    $telefone = filter_input(INPUT_POST, 'tel-user');

    echo "$login<br> $nome<br> $cpf<br> $email<br> $senha<br> $telefone";
?>
</body>
</html>
