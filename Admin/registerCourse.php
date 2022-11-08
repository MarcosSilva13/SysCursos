<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoCourses.php';
require_once '../model/Courses.php';

$dao = new DaoCourses();
//valores vindo de formAddCourses.php
$name = trim(filter_input(INPUT_POST, 'name_course'));
$price = trim(filter_input(INPUT_POST, 'price_course'));
$duration = trim(filter_input(INPUT_POST, 'duration_course'));
$description = trim(filter_input(INPUT_POST, 'description_course'));

$return = [];

if ($name && $price && $duration && $description) {
    $obj = new Courses(null, $name, $price, $duration, $description);

    if ($dao->insertCourse($obj)) {
        /*$_SESSION['registration-ok'] = true;
        header('Location: formAddCourses.php');
        exit();*/
        $return = ['status' => 'ok', 'message' => 'Confirmação: Cadastro realizado com sucesso!'];
    } else {
        /*$_SESSION['registration-fail'] = true;
        header('Location: formAddCourses.php');
        exit();*/
        $return = ['status' => 'error', 'message' => 'Erro: Não foi possível cadastrar!'];
    }
} else {
    /*$_SESSION['registration-missing-values'] = true;
    header('Location: formAddCourses.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para realizar o cadastro!'];
}

echo json_encode($return);