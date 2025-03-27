<?php
namespace project;

require_once 'User.php';
require_once 'Validate.php';

class Authorization
{
    private string $login;
    private string $password;
    private User $user;

    public function __construct()
    {
        session_start();
        $this->user = new User();

        if ($this->user->isAuthorized()) {
            echo 'success';
            var_dump($_SESSION);
            die;
        }
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): Authorization
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Authorization
    {
        $this->password = $password;
        return $this;
    }

    public function authorize(): array
    {
        $validate = new Validate();
        $response = ['status' => true, 'error' => []];

        if (!$validate->isLogin($this->login)) {
            return [
                'status' => false,
                'error' => ['message' => 'Login is invalid', 'code' => 1],
            ];
        }

        $loginData = file_exists('/login.json') ? file_get_contents( '/login.json') : '';
        $users = $loginData ? json_decode($loginData, true) : [];

        if (!isset($users['login']) || $users['login'] !== $this->login) {
            return [
                'status' => false,
                'error' => ['message' => 'User not found', 'code' => 3],
            ];
        }

        if (!password_verify($this->password, $users['password'])) {
            return [
                'status' => false,
                'error' => ['message' => 'Incorrect password', 'code' => 2],
            ];
        }

        $_SESSION['auth'] = true;
        $_SESSION['login'] = $this->login;
        $_SESSION['role'] = $users['role'];

        return $response;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authorization = new Authorization();
    $results = $authorization->setLogin($_POST["login"] ?? '')
        ->setPassword($_POST["password"] ?? '')
        ->authorize();

    print_r($results);
}