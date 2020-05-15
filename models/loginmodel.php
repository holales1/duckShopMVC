<?php

class loginModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readUser($email,$password){
        $this->db->escapeSql($email);
        $this->db->escapeSql($password);
        $user = $this->db->runQuery("SELECT UserID, email, pass,isAdmin FROM users WHERE email = '{$email}' LIMIT 1");
        return $user;
    }

    public function createUser($email,$password){
        $this->db->escapeSql($email);
        $this->db->escapeSql($password);
        $iterations = ['cost' => 15];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
        $result = $this->db->insertRow("INSERT INTO users (email, pass) VALUES ('{$email}', '{$hashed_password}')");
        return $result;
    }

 
}