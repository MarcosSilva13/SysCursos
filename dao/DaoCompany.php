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

    public function updateCompany(Company $company)
    {
        $sql = 'update empresas set nome_emp = ?, cnpj = ?, email_emp = ?, telefone_emp = ?, descricao_emp = ? 
        where id_empresa = ?;';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $company->getName());
            $pst->bindValue(2, $company->getCnpj());
            $pst->bindValue(3, $company->getEmail());
            $pst->bindValue(4, $company->getTelephone());
            $pst->bindValue(5, $company->getDescription());
            $pst->bindValue(6, $company->getIdCompany());

            if ($pst->execute()) {
                return $pst->rowCount();
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function deleteCompany($id_company) 
    {
        $sql = 'delete from empresas where id_empresa = ?;';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $id_company);

            if ($pst->execute()) {
                return $pst->rowCount();
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function findCompanyById($id_company)
    {
        $list = [];
        $sql = "select * from empresas where id_empresa = $id_company";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
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