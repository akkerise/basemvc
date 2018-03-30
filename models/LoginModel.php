<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkSignin($params = null)
    {
        $username = $params['username'] ?: $_POST['username'];
        $password = $params['password'] ?: $_POST['password'];
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = MD5(:password)");
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $password
        ));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $count = $stmt->rowCount();
        if (md5((string)$password) === $data['password']) {
            Session::init();
            Session::set('loggedIn', true);
            header('location: dashboard');
        } else {
            header('location: login');
        }

    }
}