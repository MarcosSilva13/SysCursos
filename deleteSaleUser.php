<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';

$dao = new DaoSale();

//valores vindo de coursesUser.php
$id_sale = filter_input(INPUT_POST, 'id_sale');

$return = [];

if ($dao->deleteSaleUser($id_sale) > 0) {
    /*$_SESSION['delete-sale-ok'] = true;
    header('Location: view/coursesUser.php');
    exit();*/
    $return = ['status' => 'ok', 'message' => 'Confirmação: Curso removido com sucesso!'];
} else {
    /*$_SESSION['delete-sale-not-ok'] = true;
    header('Location: view/coursesUser.php');
    exit();*/
    $return = ['status' => 'error', 'message' => 'Erro: Não foi possível remover!'];
}

echo json_encode($return);

