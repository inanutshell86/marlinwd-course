<?php

namespace App;

class Auth
{
    public $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $password)
    {
        $this->db->store('users', [
            'email' => $email,
            'password' => md5($password)
        ]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", md5($password));
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user;
            return true;
        }

        return false;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function check()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public function currentUser()
    {
        if ($this->check()) {
            return $_SESSION['user'];
        }
    }
}