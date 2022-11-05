<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCourses.php';
require_once '../model/Courses.php';

$dao = new DaoCourses();

$name = trim(filter_input(INPUT_POST, 'name-course'));
$price = trim(filter_input(INPUT_POST, 'price-course'));
$duration = trim(filter_input(INPUT_POST, 'duration-course'));
$description = trim(filter_input(INPUT_POST, 'description-course'));

if ($name && $price && $duration && $description) {
    $obj = new Courses(null, $name, $price, $duration, $description);

    if ($dao->insertCourse($obj)) {
        $_SESSION['registration-ok'] = true;
        header('Location: formAddCourses.php');
        exit();
    } else {
        $_SESSION['registration-fail'] = true;
        header('Location: formAddCourses.php');
        exit();
    }
} else {
    $_SESSION['registration-missing-values'] = true;
    header('Location: formAddCourses.php');
    exit();
}