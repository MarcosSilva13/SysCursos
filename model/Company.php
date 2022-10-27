<?php
class Company 
{
    private $id_company;
    private $name;
    private $cnpj;
    private $email;
    private $telephone;
    private $description;

    public function __construct($id_company, $name, $cnpj, $email, $telephone, $description)
    {
        $this->id_company = $id_company;
        $this->name = $name;
        $this->cnpj = $cnpj;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->description = $description;
    }

    public function getIdCompany() {
        return $this->id_company;
    }

    public function setIdCompany($id_company) {
        $this->id_company = $id_company;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}