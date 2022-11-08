<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoCourses.php';
require_once '../model/Courses.php';

$dao = new DaoCourses();
//valores vindo de formEditCourse.php
$id_course = trim(filter_input(INPUT_POST, 'id_course'));
$name = trim(filter_input(INPUT_POST, 'name_course'));
$price = trim(filter_input(INPUT_POST, 'price_course'));
$duration = trim(filter_input(INPUT_POST, 'duration_course'));
$description = trim(filter_input(INPUT_POST, 'description_course'));

$return = [];

if ($id_course && $name && $price && $duration && $description) {
    $obj = new Courses($id_course, $name, $price, $duration, $description);

    if ($dao->updateCourse($obj) > 0) {
        /*$_SESSION['update-course-ok'] = true;
        header('Location: coursesAdmin.php');
        exit();*/
        $return = ['status' => 'ok', 'message' => 'Confirmação: Curso atualizado com sucesso!'];
    } else {
        /*$_SESSION['update-course-fail'] = true;
        header('Location: coursesAdmin.php');
        exit();*/
        $return = ['status' => 'error', 'message' => 'Erro: Não foi possível atualizar!'];
    }
} else {
    /*$_SESSION['missing-course-values'] = true;
    header('Location: coursesAdmin.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para atualizar!'];
}

echo json_encode($return);