<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';
require_once 'dao/DaoUser.php';

$daoSale = new DaoSale();
$daoUser = new DaoUser();

$id_user = $_SESSION['id_user'];

if ($daoSale->deleteSaleReference($id_user) > 0) {
    if (($daoUser->deleteUser($id_user)) > 0) {
        header('Location: index.php');
        unset($_SESSION['id_user']);
        exit();
    } else {
        echo "nao deletou no daoUser";
    }
} else {
    echo "nao deletou no daoSale";
}