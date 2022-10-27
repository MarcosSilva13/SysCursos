<?php

require_once 'Connection.php';

class DaoCompany 
{
    public function insertCompany(Company $company) 
    {
        $sql = 'insert into empresas (nome_emp, cnpj, email_emp, telefone_emp, descricao_emp)
        values (?, ?, ?, ?, ?);';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $company->getName());
            $pst->bindValue(2, $company->getCnpj());
            $pst->bindValue(3, $company->getEmail());
            $pst->bindValue(4, $company->getTelephone());
            $pst->bindValue(5, $company->getDescription());
    
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            //$ex->getMessage();
            return false;
        }
    }

    public function listCompany() 
    {
        $list = [];
        $sql = 'select * from empresas';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        
        return $list;
    }

    public function checkRepeatedCnpj($cnpj) 
    {
        $list = [];
        $sql = 'select count(*) as total_cnpj from empresas where cnpj = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $cnpj);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        
        return $list;
    }
}