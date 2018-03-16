<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkSignin($params = null)
    {
        echo "<pre>"; print_r($this->db); die();
        $username = $params['username'] ?: $_POST['username'];
        $password = $params['password'] ?: $_POST['password'];
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username AND password = MD5(:password)");
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $password
        ));
        $data = $stmt->fetchAll();
        echo "<pre>"; print_r($data); die();
    }
}