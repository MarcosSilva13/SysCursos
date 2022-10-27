<?php

require_once 'Connection.php';

class DaoUser
{
    public function insertUser(Users $user)
    {
        $sql = 'insert into usuarios (login, nome, cpf, email, senha, telefone)
        values (?, ?, ?, ?, ?, ?);'; // add md5
        try {
            $pst = Connection::getPreparedStatement($sql);
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
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function listUsers() 
    {
        $list = [];
        $sql = 'select * from usuarios';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function updateUser(Users $user) 
    {
        $sql = 'update usuarios set login = ?, nome = ?, cpf = ?, email = ?, senha = ?, telefone = ? 
        where id_usuario = ?;';
        try {
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
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function deleteUser($id_user) 
    {
        $sql = "delete from usuarios where id_usuario = $id_user;";
        try {
            $pst = Connection::getPreparedStatement($sql);
    
            if ($pst->execute()) {
                return $pst->rowCount();
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function login($user, $password) 
    {
        $list = [];
        $sql = 'select * from usuarios where login = ? OR email = ? and senha = ?;';
        $pst = Connection::getPreparedStatement($sql);
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

    public function checkRepeatedEmail($email)
    {
        $list = [];
        $sql = 'select count(*) as total_email from usuarios where email = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $email);
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