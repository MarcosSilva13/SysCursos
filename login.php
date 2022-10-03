<?php
session_start();
require_once 'dao/Connection.php';

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');

//$sql = "select login from usuarios where login = '{$usuario}' and senha = '{$senha}'";
$sql = 'select login from usuarios where login = ? and senha = ?;';
$pst = Connection::getPreparedStatement($sql);
$pst->bindValue(1, $usuario);
$pst->bindValue(2, $senha);

if ($pst->execute()) {
    $row = $pst->rowCount();
} else {
    $row = 0;
}

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}


/*public function localiza($id) {
    $lista = [];
    $pst = Conexao::getPreparedStatement('select * from student where Ra = ?;');
    $pst->bindValue(1, $id);
    $pst->execute();
    $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}*/