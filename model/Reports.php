<?php
class Reports 
{
    private $id_report;
    private $num_sale;
    private $date;
    private $user;
    private $course;
    private $company;
    private $price;
    private $payment;

    public function __construct($id_report, $num_sale, $date, $user, $course, $company, $price, $payment)
    {
        $this->id_report = $id_report;
        $this->num_sale = $num_sale;
        $this->date = $date;
        $this->user = $user;
        $this->course = $course;
        $this->company = $company;
        $this->price = $price;
        $this->payment = $payment;
    }

    public function getIdReport() {
        return $this->id_report;
    }

    public function getNumSale() {
        return $this->num_sale;
    }
    public function getDate() {
        return $this->date;
    }
    public function getUser() {
        return $this->user;
    }
    public function getCourse() {
        return $this->course;
    }
    public function getCompany() {
        return $this->company;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getPayment() {
        return $this->payment;
    }
}