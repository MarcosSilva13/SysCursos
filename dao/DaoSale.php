<?php

require_once 'Connection.php';

class DaoSale 
{
    public function insertSale(Sales $sale) 
    {
        $sql = 'insert into venda (id_usuario, id_curso, data_venda, forma_pagamento, valor)
        values (?, ?, ?, ?, ?);';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $sale->getIdUser());
            $pst->bindValue(2, $sale->getIdCourse());
            $pst->bindValue(3, $sale->getSaleDate());
            $pst->bindValue(4, $sale->getPayment());
            $pst->bindValue(5, $sale->getFinalPrice());
    
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function listCoursesUser($id_user) 
    {
        $list = [];
        $sql = "select v.id_venda, c.id_curso, c.nome_curso, c.valor_curso, c.duracao_curso, c.descricao_curso, emp.nome_emp from cursos c
        join venda v on c.id_curso = v.id_curso
        join usuarios us on v.id_usuario = us.id_usuario
        join fornece f on c.id_curso = f.id_curso
        join empresas emp on f.id_empresa = emp.id_empresa
        where us.id_usuario = $id_user order by c.id_curso;";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function checkSale($id_user)
    {
        $list = [];
        $sql = "select count(*) as total_compra from venda v 
        join usuarios us on us.id_usuario = v.id_usuario where us.id_usuario = $id_user;";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        
        return $list;
    }

    public function checkSaleCourse($id_course)
    {
        $list = [];
        $sql = 'select count(*) as total_course from venda where id_curso = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id_course);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function selectLastSale()
    {
        $list = [];
        $sql = 'select v.id_venda, v.data_venda, us.login, c.nome_curso, emp.nome_emp, v.valor, v.forma_pagamento 
        from venda v join usuarios us on us.id_usuario = v.id_usuario
        join cursos c on c.id_curso = v.id_curso
        join fornece f on f.id_curso = c.id_curso
        join empresas emp on f.id_empresa = emp.id_empresa
        order by v.id_venda desc limit 1;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function deleteSaleUser($id_sale) 
    {
        $sql = "delete from venda where id_venda = $id_sale;";
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

    public function deleteSaleReference($id_user) // remove as todas as compras de um usuario
    {
        $sql = "delete from venda where id_usuario = $id_user;";
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

    public function deleteSaleReferenceCourse($id_course) // remove as todas as venda de um curso
    {
        $sql = "delete from venda where id_curso = $id_course;";
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
}