<!-- logout-->
<?php
session_start(); 

$_SESSION = array();

//limpar cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $param["secure"],
        $params["httponly"]
    );
}

//destruir sessão 
session_destroy();

//Redicionar 
header("Location: login.php");
?>