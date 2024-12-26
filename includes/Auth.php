<?php
// Autenticacao do usuario
//includes/Auth.php
class Auth {
    private $user;

    public function __construct($user) {
        $this->user = $user;

    }

    public function login($email, $password) {
        $user = $this->user->findByEmail($email);
        if ($user && $password === $user['password']) {
            //Usar hash em producao!
            session_start();
            $_SESSION['email'] = $user['email'];
            return true;
        }
        return false;
    }
    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['email']);
    }
}