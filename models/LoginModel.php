<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin()
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username AND password = MD5(:password)");
        echo "<pre>";
        var_dump($stmt);
        die();
        $stmt->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));
        $user = $stmt->fetchAll();
        echo "<pre>";
        print_r($user);
        die();
    }
}