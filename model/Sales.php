<?php

class Sales 
{
    private $id_sale;
    private $id_user;
    private $id_course;
    private $date;
    private $payment;
    private $final_price;

    public function __construct($id_sale, $id_user, $id_course, $date, $payment, $final_price)
    {
        $this->id_sale = $id_sale;
        $this->id_user = $id_user;
        $this->id_course = $id_course;
        $this->date = $date;
        $this->payment = $payment;
        $this->final_price = $final_price;        
    }

    public function getIdSale() {
        return $this->id_sale;
    }

    public function setIdSale($id_sale) {
        $this->id_sale = $id_sale;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getIdCourse() {
        return $this->id_course;
    }

    public function setIdCourse($id_course) {
        $this->id_course = $id_course;
    }

    public function getSaleDate() {
        return $this->date;
    }

    public function setSaleDate($date) {
        $this->date = $date;
    }

    public function getPayment() {
        return $this->payment;
    }

    public function setPayment($payment) {
        $this->payment = $payment;
    }

    public function getFinalPrice() {
        return $this->final_price;
    }

    public function setFinalPrice($final_price) {
        $this->final_price = $final_price;
    }
}