<?php
session_start();
require_once '../dao/Connection.php';
require_once '../dao/DaoCourses.php';
require_once '../dao/DaoProvide.php';
require_once '../dao/DaoSale.php';

$daoSale = new DaoSale();
$daoCourse = new DaoCourses();
$daoProvide = new DaoProvide();

$id_course = filter_input(INPUT_POST, 'id_course');

$listCourse = $daoSale->checkSaleCourse($id_course);
$total_course = $listCourse[0];

$listProvide = $daoProvide->checkProvideCourse($id_course);
$total_fornece = $listProvide[0];

if ($total_course['total_course'] > 0) { //verifica se o curso esta em uma venda
    $daoSale->deleteSaleReferenceCourse($id_course); //remove o curso da venda
    
    if ($total_fornece['total_fornece'] > 0) { //verifica se o curso esta ligado a uma empresa
        $daoProvide->deleteProvideByCourse($id_course); //remove a ligação do curso com a empresa
        if ($daoCourse->deleteCourse($id_course) > 0) { //remove o curso
            $_SESSION['delete-course-ok'] = true;
            header('Location: coursesAdmin.php');
            exit();
        }
    } else { //curso está em uma venda mas não está em ligação com uma empresa
        if ($daoCourse->deleteCourse($id_course) > 0) { //remove o curso
            $_SESSION['delete-course-ok'] = true;
            header('Location: coursesAdmin.php');
            exit();
        }
    }
} else { //curso não está em uma venda
    if ($total_fornece['total_fornece'] > 0) { //verifica se o curso esta ligado a uma empresa
        $daoProvide->deleteProvideByCourse($id_course); //remove a ligação do curso com a empresa
        if ($daoCourse->deleteCourse($id_course) > 0) { //remove o curso
            $_SESSION['delete-course-ok'] = true;
            header('Location: coursesAdmin.php');
            exit();
        }
    } else { //curso não está em uma venda nem em uma ligação com uma empresa
        if ($daoCourse->deleteCourse($id_course) > 0) { //remove o curso
            $_SESSION['delete-course-ok'] = true;
            header('Location: coursesAdmin.php');
            exit();
        }
    }
}