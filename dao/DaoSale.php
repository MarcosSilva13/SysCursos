<?php

require_once 'Connection.php';

class DaoSale 
{
    public function insertSale(Sales $sale) 
    {
        $sql = 'insert into venda (id_usuario, id_curso, data_venda, forma_pagamento, valor)
        values (?, ?, ?, ?, ?);';
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
    }

    public function listCoursesUser($id_user) 
    {
        $list = [];
        $sql = "select c.id_curso, c.nome_curso, c.valor_curso, c.duracao_curso, c.descricao_curso from cursos c
        join venda v on c.id_curso = v.id_curso
        join usuarios us on v.id_usuario = us.id_usuario
        where us.id_usuario = $id_user;";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function deleteSaleUser($id_user, $id_course) 
    {
        $sql = 'delete from venda where id_usuario = ? and id_curso = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id_user);
        $pst->bindValue(2, $id_course);
        
        if ($pst->execute()) {
            return $pst->rowCount();
        } else {
            return false;
        }
    }

    //public function deleteSaleAdmin() {}
}