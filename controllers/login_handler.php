    <?php
    require_once '../includes/Database.php';
    require_once '../includes/User.php';
    require_once '../includes/Auth.php';
    require_once '../includes/logout.php';

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'O email é obrigatório e deve ser válido.';
        }
        if (empty($password)) {
            $errors[] = 'A senha é obrigatoria.';
        }

        if (empty($errors)) {
            $db = (new Database())->connect();
            $user = new User($db);
            $auth = new Auth($user);

            if ($auth->login($email, $password)) {
                header('Location: ../views/table.php');
                exit;
            } else {
                $errors[] = 'Credenciais inválidas.';
            }
        }
    }

    //Logout caso solicitado, chama o metodo logout.php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $logout = new Logout();
        $logout->logout();
    }
    ?>