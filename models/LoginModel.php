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
        $password = md5($params['password'] ?: $_POST['password']);
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(array(
            ':username' => $username
        ));
        $data = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        
        if (password_verify($data->password, $password)) {
            echo "<pre>"; var_dump(1); die();
        }
        
        echo "<pre>";
        var_dump(2);
        die();
    }
}