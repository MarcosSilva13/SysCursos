<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCourses.php';
require_once '../model/Courses.php';

$dao = new DaoCourses();

//valores vindo de formEditCourse.php
$id_course = trim(filter_input(INPUT_POST, 'id-course'));
$name = trim(filter_input(INPUT_POST, 'name-course'));
$price = trim(filter_input(INPUT_POST, 'price-course'));
$duration = trim(filter_input(INPUT_POST, 'duration-course'));
$description = trim(filter_input(INPUT_POST, 'description-course'));

if ($id_course && $name && $price && $duration && $description) {
    $obj = new Courses($id_course, $name, $price, $duration, $description);

    if ($dao->updateCourse($obj) > 0) {
        $_SESSION['update-course-ok'] = true;
        header('Location: coursesAdmin.php');
        exit();
    } else {
        $_SESSION['update-course-fail'] = true;
        header('Location: coursesAdmin.php');
        exit();
    }
} else {
    $_SESSION['missing-course-values'] = true;
    header('Location: coursesAdmin.php');
    exit();
}