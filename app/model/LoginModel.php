<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run($params = null)
    {
        $username = $params['username'] ?: $_POST['username'];
        $password = $params['password'] ?: $_POST['password'];
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = MD5(:password)");
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $password
        ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ((md5((string)$password) === $data['password']) && ($count > 0)) {
            // logged
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            // loggout
            header('location: ../login');
        }
    }
}