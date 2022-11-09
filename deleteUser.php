<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';
require_once 'dao/DaoUser.php';

$daoSale = new DaoSale();
$daoUser = new DaoUser();

$id_user = $_SESSION['id_user'];

$list = $daoSale->checkSale($id_user);
$total_compras = $list[0];

$return = [];

if ($total_compras['total_compra'] > 0) { // verifica se o usuario tem compras para remover as compras associadas
    if ($daoSale->deleteSaleReference($id_user) > 0) { // remove todas as compras associadas ao usuario
        if (($daoUser->deleteUser($id_user)) > 0) { // deleta o usuario
            /*header('Location: index.php');
            unset($_SESSION['id_user']);
            exit();*/
            unset($_SESSION['id_user']);
            $return = ['status' => 'ok'];
        } else {
            $return = ['status' => 'error'];
        }
    } else {
        $return = ['status' => 'error'];
    }
} else { // senão tiver compras, remove o usuario
    if (($daoUser->deleteUser($id_user)) > 0) { 
        /*header('Location: index.php');
        unset($_SESSION['id_user']);
        exit();*/
        unset($_SESSION['id_user']);
        $return = ['status' => 'ok'];
    } else {
        $return = ['status' => 'error'];
    }
}

echo json_encode($return);