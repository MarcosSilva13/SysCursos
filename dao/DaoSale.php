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
}