<?php
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';

$dao = new DaoSale();

//valores vindo de coursesUser.php
$id_user = filter_input(INPUT_POST, 'id_user');
$id_course = filter_input(INPUT_POST, 'id_course');

if ($dao->deleteSaleUser($id_user, $id_course) > 0) {
    $_SESSION['aviso'] = 1;
    header('Location: view/coursesUser.php');
    exit();
} else {
    echo "<script>alert('Não foi possivel deletar!');</script>";
}

