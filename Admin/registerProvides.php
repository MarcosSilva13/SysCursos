<?php
require_once '../dao/Connection.php';
require_once '../dao/DaoProvide.php';
require_once '../model/Provides.php';

$dao = new DaoProvide();
//valores vindo de formAddProvides.php
$id_company = filter_input(INPUT_POST, 'company');
$id_course = filter_input(INPUT_POST, 'course');

$return = [];

if ($id_company && $id_course) {

    $list = $dao->checkProvideCourse($id_course);
    $total_fornece = $list[0];

    if ($total_fornece['total_fornece'] > 0) { //verifica se um curso ja esta associado a alguma empresa 
        /*$_SESSION['provide-exists'] = true;
        header('Location: formAddProvides.php');
        exit();*/
        $return = ['status' => 'warning', 'message' => 'Atenção: O curso já é fornecido por uma empresa!'];
    } else {
        $obj = new Provides(null, $id_company, $id_course);
    
        if ($dao->insertProvide($obj)) {
            /*$_SESSION['register-provide-ok'] = true;
            header('Location: formAddProvides.php');
            exit();*/
            $return = ['status' => 'ok', 'message' => 'Confirmação: Cadastro realizado com sucesso!'];
        } else {
            /*$_SESSION['register-provide-fail'] = true;
            header('Location: formAddProvides.php');
            exit();*/
            $return = ['status' => 'error', 'message' => 'Erro: Não foi possível cadastrar o fornecimento!'];
        }
    }
} else {
    /*$_SESSION['missing-values-provide'] = true;
    header('Location: formAddProvides.php');
    exit();*/
    $return = ['status' => 'warning', 'message' => 'Atenção: Dados insuficientes para realizar o cadastro!'];
}

echo json_encode($return);