<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoReports.php';

$termo_pesquisa = trim(filter_input(INPUT_POST, 'search'));
$tipo = trim(filter_input(INPUT_POST, 'tipo'));

$dao = new DaoReports();
$return = [];

if ($termo_pesquisa && $tipo) {
    if ($tipo == 'all') {
        $list = $dao->listReports();
        $return = $list;
    } else {
        $list = $dao->findReports($termo_pesquisa, $tipo);
        if (!$list == '') {
            $return = $list;
        } else {
            $return = null;
        }
    }
} else {
    $return = null;
}

echo json_encode($return);