<?php
session_start();

require_once '../dao/Connection.php';
require_once '../dao/DaoProvide.php';
require_once '../model/Provides.php';

$dao = new DaoProvide();

$id_company = filter_input(INPUT_POST, 'company');
$id_course = filter_input(INPUT_POST, 'course');

$list = $dao->checkProvide($id_course);
$total_fornece = $list[0];

if ($total_fornece['total_fornece'] > 0) { //verifica se um curso ja esta associado a alguma empresa 
    $_SESSION['provide-exists'] = true;
    header('Location: formAddProvides.php');
    exit();
}

if ($id_company && $id_course) {
    $obj = new Provides(null, $id_company, $id_course);

    if ($dao->insertProvide($obj)) {
        $_SESSION['register-provide-ok'] = true;
        header('Location: formAddProvides.php');
        exit();
    } else {
        $_SESSION['register-provide-fail'] = true;
        header('Location: formAddProvides.php');
        exit();
    }
} else {
    $_SESSION['missing-values-provide'] = true;
    header('Location: formAddProvides.php');
    exit();
}