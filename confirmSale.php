<?php
session_start();
require_once 'dao/Connection.php';
require_once 'dao/DaoSale.php';
require_once 'model/Sales.php';

$dao = new DaoSale();
//valores vindo de formBuyCourse.php
$id_user = filter_input(INPUT_POST, 'id_user');
$id_course = filter_input(INPUT_POST, 'id_course');
$date = date('Y-m-d', time());
$payment = filter_input(INPUT_POST, 'payment');
$final_price = filter_input(INPUT_POST, 'course_price');

echo "$id_user<br>$id_course<br>$date<br>$payment<br>$final_price<br>";

if ($id_user && $id_course && $date && $payment && $final_price) {
    $obj = new Sales(null, $id_user, $id_course, $date, $payment, $final_price);

    if ($dao->insertSale($obj)) {
        $_SESSION['confirm-sale'] = true; // sessão para notificação de compra
        header('Location: view/formBuyCourse.php');
        exit();
    } else {
        $_SESSION['no-confirm-sale'] = true;
        header('Location: view/formBuyCourse.php');
        exit();
    }
}
