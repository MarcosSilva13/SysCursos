<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';

$dao = new DaoSale();

//valores vindo de coursesUser.php
$id_sale = filter_input(INPUT_POST, 'id_sale');
/*$id_user = filter_input(INPUT_POST, 'id_user');
$id_course = filter_input(INPUT_POST, 'id_course');*/

if ($dao->deleteSaleUser($id_sale) > 0) {
    $_SESSION['delete-sale-ok'] = true;
    header('Location: view/coursesUser.php');
    exit();
} else {
    $_SESSION['delete-sale-not-ok'] = true;
    header('Location: view/coursesUser.php');
    exit();
}

