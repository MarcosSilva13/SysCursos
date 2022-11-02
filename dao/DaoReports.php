<?php
require_once 'Connection.php';
class DaoReports 
{
    public function insertReport(Reports $report)
    {
        $sql = 'insert into relatorios (num_venda, data, usuario, curso, empresa, valor, pagamento)
        values (?, ?, ?, ?, ?, ?, ?);';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $report->getNumSale());
            $pst->bindValue(2, $report->getDate());
            $pst->bindValue(3, $report->getUser());
            $pst->bindValue(4, $report->getCourse());
            $pst->bindValue(5, $report->getCompany());
            $pst->bindValue(6, $report->getPrice());
            $pst->bindValue(7, $report->getPayment());

            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function listReports()
    {
        $list = [];
        $sql = 'select * from relatorios';
        $pst = connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }
}