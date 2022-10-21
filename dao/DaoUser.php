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

    // public function listUsers() {}

    public function updateUser(Users $user) 
    {
        $sql = 'update usuarios set login = ?, nome = ?, cpf = ?, email = ?, senha = ?, telefone = ? 
        where id_usuario = ?;';

        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $user->getLogin());
        $pst->bindValue(2, $user->getName());
        $pst->bindValue(3, $user->getCpf());
        $pst->bindValue(4, $user->getEmail());
        $pst->bindValue(5, $user->getPassword());
        $pst->bindValue(6, $user->getTelephone());
        $pst->bindValue(7, $user->getIdUser());

        if ($pst->execute()) {
            return $pst->rowCount();
        } else {
            return false;
        }
    }

    public function deleteUser($id_user) 
    {
        $sql = "delete from usuarios where id_usuario = $id_user;";
        $pst = Connection::getPreparedStatement($sql);

        if ($pst->execute()) {
            return $pst->rowCount();
        } else {
            return false;
        }
    }

    public function login($user, $password) 
    {
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

    public function checkRepeatedLogin($login) 
    {
        $list = [];
        
        $sql = 'select count(*) as total_login from usuarios where login = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $login);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function checkRepeatedCpf($cpf)
    {
        $list = [];

        $sql = 'select count(*) as total_cpf from usuarios where cpf = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $cpf);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function findUser($id_user) 
    {
        $list = [];

        $sql = "select * from usuarios where id_usuario = $id_user;";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }
}