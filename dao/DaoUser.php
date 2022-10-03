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

    //terminar o resto 
}