<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';
require_once 'model/Sales.php';
require_once 'dao/DaoReports.php';
require_once 'model/Reports.php';

$dao = new DaoSale();
//valores vindo de formBuyCourse.php
$id_user = filter_input(INPUT_POST, 'id_user');
$id_course = filter_input(INPUT_POST, 'id_course');
$date = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$payment = filter_input(INPUT_POST, 'payment');
$final_price = filter_input(INPUT_POST, 'course_price');
$password = filter_input(INPUT_POST, 'password');

$pst = Connection::getPreparedStatement("select senha from usuarios where id_usuario = $id_user");
$pst->execute();
$bd_pass = $pst->fetchAll(PDO::FETCH_ASSOC);

if (!password_verify($password, $bd_pass[0]['senha'])) { //verifica se a senha está correta
    $_SESSION['wrong-password'] = true;
    header('Location: view/coursesDefault.php');
    exit();
}

if ($id_user && $id_course && $date && ($payment != "") && $final_price && $password) {
    $obj = new Sales(null, $id_user, $id_course, $date->format('Y-m-d'), $payment, $final_price);

    if ($dao->insertSale($obj)) {
        $list = $dao->selectLastSale(); // consulta para pegar os dados e inserir no relatorio
        if ($list) {
            $values = $list[0];
            $num_sale = $values['id_venda'];
            $date = $values['data_venda'];
            $user = $values['login'];
            $course = $values['nome_curso'];
            $company = $values['nome_emp'];
            $price = $values['valor'];
            $payment = $values['forma_pagamento'];
            
            $daoReport = new DaoReports();
            $obj = new Reports(null, $num_sale, $date, $user, $course, $company, $price, $payment);
            $daoReport->insertReport($obj);
        }
        $_SESSION['confirm-sale-ok'] = true; // sessão para notificação de compra
        header('Location: view/coursesUser.php');
        exit();
    } else {
        $_SESSION['confirm-sale-not-ok'] = true;
        header('Location: view/coursesDefault.php');
        exit();
    }
} else {
    $_SESSION['values-not-ok'] = true; // sessão para notificação de valores faltando
    header('Location: view/coursesDefault.php');
    exit();
}