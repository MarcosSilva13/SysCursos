<?php
class Courses
{
    private $id_course;
    private $name;
    private $price;
    private $course_duration;
    private $description;

    public function __construct($id_course, $name, $price, $course_duration, $description)
    {
        $this->id_course = $id_course;
        $this->name = $name;
        $this->price = $price;
        $this->course_duration = $course_duration;
        $this->description = $description;
    }

    public function getIdCourse() {
        return $this->id_course;
    }

    public function setIdCourse($id_course) {
        $this->id_course = $id_course;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    public function getCourseDuration() {
        return $this->course_duration;
    }

    public function setCourseDuration($course_duration) {
        $this->course_duration = $course_duration;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}

