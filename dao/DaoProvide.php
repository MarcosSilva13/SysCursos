<?php
require_once 'Connection.php';

class DaoProvide 
{
    public function insertProvide(Provides $provide) 
    {
        $sql = 'insert into fornece (id_empresa, id_curso) values (?, ?);';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $provide->getIdCompany());
            $pst->bindValue(2, $provide->getIdCourse());

            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function checkProvide($id_course)
    {
        $list = [];
        $sql = 'select count(*) as total_fornece from fornece where id_curso = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id_course);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }

    public function deleteProvideByCourse($id_course) 
    {
        $sql = "delete from fornece where id_curso = $id_course;";
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