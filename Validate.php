<?php

namespace project;

class Validate
{
    public function isLogin(string $login): bool
    {
        return (bool)filter_var($login, FILTER_VALIDATE_EMAIL);
    }
}
