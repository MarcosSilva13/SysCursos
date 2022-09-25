<?php
class Users
{
    private $id_user;
    private $login;
    private $name;
    private $cpf;
    private $email;
    private $password;
    private $telephone;
    private $type;

    public function __construct($id_user, $login, $name, $cpf, $email, $password, $telephone, $type)
    {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->type = $type;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}