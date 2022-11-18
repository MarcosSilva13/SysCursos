<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoReports.php';

$id_report = filter_input(INPUT_POST, 'id_reports');
$dao = new DaoReports();

$return = [];

if ($id_report) {
    if ($dao->deleteReport($id_report) > 0) {
        $return = ['status' => 'ok', 'message' => 'Confirmação: Relatório excluído com sucesso!'];
    } else {
        $return = ['status' => 'error', 'message' => 'Erro: Não foi possível excluir!'];
    }
}

echo json_encode($return);