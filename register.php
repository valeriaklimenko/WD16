<?php

namespace project;
require_once 'Validate.php';
use project\Validate;

class register
{
private string $login;
private string $password;

public function __construct()
{

}
public function getLogin(): string
{
    return $this->login;
}
public function setLogin(string $login): register
{
    $this->login = $login;
    return $this;
}
public function getPassword(): string
{
    return $this->password;
}
public function setPassword(string $password): register
{
    $this->password = $password;
    return $this;
}
public function register(): array
{
    $validate = new Validate();
    $response = [
        'status' => true,
        'error' => [],
    ];
    if (!$validate->isLogin($this->login)) {
        $response = [
            'status' => true,
            'error' => [
                'message' => 'please enter all the fields',
                'code' => 3
            ],
        ];
    }
    $loginData = file_get_contents( __DIR__. '/login.json');
    if ($loginData && str_contains($loginData, $this->login)) {
        return [
            'status' => false,
            'error' => [
                'message' => 'Login is already taken',
                'code' => 4
            ],
        ];
    }

    if ($response['status']) {
        $data = [
            'login' => $this->login,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        file_put_contents(__DIR__ . '/login.json', json_encode($data) . PHP_EOL, FILE_APPEND);
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = $data['password'];
        $_SESSION['role'] = 'user';
    }
    return $response;