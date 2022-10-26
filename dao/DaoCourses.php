<?php

require_once 'Connection.php';

class DaoCourses 
{
    public function insertCourse(Courses $course) 
    {
        $sql = 'insert into cursos (nome_curso, valor_curso, duracao_curso, descricao_curso)
        values (?, ?, ?, ?);';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $course->getName());
            $pst->bindValue(2, $course->getPrice());
            $pst->bindValue(3, $course->getCourseDuration());
            $pst->bindValue(4, $course->getDescription());
    
            if ($pst->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function findCourse($name) 
    {
        $list = [];
        //$sql = "select * from cursos where nome_curso like '%$name%';";
        $sql = "select c.id_curso, c.nome_curso, c.valor_curso, c.duracao_curso, c.descricao_curso, emp.nome_emp from cursos c
        join fornece f on c.id_curso = f.id_curso
        join empresas emp on f.id_empresa = emp.id_empresa where c.nome_curso like '%$name%'";
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function listCourses() 
    {
        $list = [];
        $sql = 'select c.id_curso, c.nome_curso, c.valor_curso, c.duracao_curso, c.descricao_curso, emp.nome_emp from cursos c
        join fornece f on c.id_curso = f.id_curso
        join empresas emp on f.id_empresa = emp.id_empresa order by c.id_curso;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $list = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function updateCourse(Courses $course) 
    {
        $sql = 'update cursos set nome_curso = ?, valor_curso = ?, duracao_curso = ?, descricao_curso where id_curso = ?;';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $course->getName());
            $pst->bindValue(2, $course->getPrice());
            $pst->bindValue(3, $course->getCourseDuration());
            $pst->bindValue(4, $course->getDescription());
            $pst->bindValue(5, $course->getIdCourse());
    
            if ($pst->execute()) {
                return $pst->rowCount();
            } else {
                return false;
            }
        } catch(PDOException $ex) {
            return false;
        }
    }

    public function deleteCourse(Courses $course) 
    {
        $sql = 'delete from cursos where id_curso = ?;';
        try {
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $course->getIdCourse());
    
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