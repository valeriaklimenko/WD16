<?php
header('Content-Type: application/json; charset=utf-8');

$result = false;
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["login"]) || empty($_POST["login"])) {
        $error[] = ['code' => 1, 'message' => 'no login'];
    }

    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $error[] = ['code' => 2, 'message' => 'no pass'];
    }

    if (empty($error)) {
        $login = ($_POST["login"]);
        $password = ($_POST["password"]);

        $userFile = "users/" . $login . ".json";

        if (!file_exists($userFile)) {
            $error[] = ['code' => 3, 'message' => 'User does not exist'];
        } else {
            $userData = json_decode(file_get_contents($userFile), true);

            $salt = $userData['salt'];
            $passwordHash = hash('sha256', $salt . $password);

            if ($passwordHash === $userData['password']) {
                $result = true;
            } else {
                $error[] = ['code' => 4, 'message' => 'Incorrect password'];
            }
        }
    }
}

echo json_encode(['result' => $result, 'error' => $error]);
?>
