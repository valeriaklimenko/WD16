<?php
namespace project;
class User
{
private string $login;
private string $password;

public function __construct()
{}
public function isAuthorized(): bool
{
    return $this->isAuthorized;
}
public function getLogin(): string
{
    return $this->login;
}
    public function setLogin(string $login): User
    {
        $this->login = $login;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }
}