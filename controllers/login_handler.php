    <!-- O controller vai indicar as direções e quais arquivos usar para realizar certas operações, como por exemplo para mostrar clientes, ele vai buscar o arquivo que conecta com a database e depois vai chamar a view que é para mostrar o conteudo e enviar os dados -->
    <?php
    require_once '../Models/database.php';
    require_once '../includes/User.php';
    require_once '../includes/auth_class.php';
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

        //Caso não haja erros
        if (empty($errors)) {
            $db = (new Database())->connect();
            $user = new User($db);
            $auth = new Auth($user);

            if ($auth->login($email, $password)) {
                header('Location: ../views/app_dashboard.php');
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