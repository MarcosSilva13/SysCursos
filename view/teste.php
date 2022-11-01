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

    $bd_pass = filter_input(INPUT_POST, 'bd-pass');
    $form_pass = filter_input(INPUT_POST, 'password-user');
    echo "bd = $bd_pass<br>";
    echo "form = $form_pass<br>";

    if ($form_pass != $bd_pass) {
        echo 'é diferente, crip denovo';
    } else {
        echo 'são iguais ainda, mandar a do form';
    }

?>
</body>
</html>
