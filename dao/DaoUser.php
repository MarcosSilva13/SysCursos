<?php

use Connection as GlobalConnection;

require_once 'Connection.php';

class DaoUser
{
    public function insertUser(Users $user)
    {
        $sql = 'insert into usuarios (login, nome, cpf, email, senha, telefone)
        values (?, ?, ?, ?, ?, ?);'; // add md5

        $pst = GlobalConnection::getPreparedStatement($sql);
        $pst->bindValue(1, $user->getLogin());
        $pst->bindValue(2, $user->getName());
        $pst->bindValue(3, $user->getCpf());
        $pst->bindValue(4, $user->getEmail());
        $pst->bindValue(5, $user->getPassword());
        $pst->bindValue(6, $user->getTelephone());

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($user, $password) {
        $list = [];

        $sql = 'select id_usuario, login, nome, tipo from usuarios where login = ? OR email = ? and senha = ?;';
        $pst = GlobalConnection::getPreparedStatement($sql);
        $pst->bindValue(1, $user);
        $pst->bindValue(2, $user);
        $pst->bindValue(3, $password);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function checkRepeatedLogin($login) {
        $list = [];
        
        $sql = 'select count(*) as total from usuarios where login = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $login);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    //terminar o resto 
}