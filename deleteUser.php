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

if ($total_compras['total_compra'] > 0) { // verifica se o usuario tem compras para remover as compras associadas
    if ($daoSale->deleteSaleReference($id_user) > 0) { // remove todas as compras associadas ao usuario
        if (($daoUser->deleteUser($id_user)) > 0) { // deleta o usuario
            header('Location: index.php');
            unset($_SESSION['id_user']);
            exit();
        } else {
            echo "nao deletou no daoUser";
        }
    } else {
        echo "nao deletou no daoSale";
    }
} else { // senão tiver compras, remove o usuario
    if (($daoUser->deleteUser($id_user)) > 0) { 
        header('Location: index.php');
        unset($_SESSION['id_user']);
        exit();
    } else {
        echo "nao deletou no daoUser";
    }
}
