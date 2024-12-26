<!-- logout-->
<?php
class Logout {
    public function logout() {
        //Inicia a sessao 
        session_start();

        //Limpa a sessao
        $_SESSION = array();

        //Se houver cookies, apaga
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() -42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]

            );
        }
        //Destroi a sessao 
        session_destroy();

        //Redireciona para a pagina de login (index.php)
        header("Location: ../index.php");
        exit;
    }
}
?>