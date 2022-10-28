<?php
class Provides 
{
    private $id_provides;
    private $id_company;
    private $id_course;

    public function __construct($id_provides, $id_company, $id_course)
    {
        $this->id_provides = $id_provides;
        $this->id_company = $id_company;
        $this->id_course = $id_course;
    }

    public function getIdProvides() {
        return $this->id_provides;
    }

    public function setIdProvides($id_provides) {
        $this->id_provides = $id_provides;
    }

    public function getIdCompany() {
        return $this->id_company;
    }

    public function setIdCompany($id_company) {
        $this->id_company = $id_company;
    }

    public function getIdCourse() {
        return $this->id_course;
    }

    public function setIdCourse($id_course) {
        $this->id_course = $id_course;
    }
}