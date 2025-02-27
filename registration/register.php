<?php
header('Content-Type: application/json; charset=utf-8');
$result = false;
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["login"])) {
        $error[] = ['code' => 1, 'message' => 'no login'];
    }
    if (!isset($_POST["password"])) {
        $error[] = ['code' => 2, 'message' => 'no pass'];
    }
    if (empty($error)) {
        $login = htmlspecialchars($_POST["login"]);
        $password = htmlspecialchars($_POST["password"]);

        $userFile = "users/" . $login . ".json";

        if (file_exists($userFile)) {
            $error[] = ['code' => 3, 'message' => 'User already exists'];
        }

        if (empty($error)) {
            $salt = bin2hex(random_bytes(16));
            $passwordHash = hash('sha256', $salt . $password);

            $userData = [
                'login' => $login,
                'password' => $passwordHash,
                'salt' => $salt,
                'avatar'

            ];
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $tmp_name = $_FILES['avatar']['tmp_name'];
                $target = "uploads/" . basename($_FILES["avatar"]["name"]);
                $file_name = basename($_FILES["avatar"]["name"]);

                if(!move_uploaded_file($tmp_name, $target)) {
                    $error[] = [
                        'code' => 3,
                        'message' => 'no load image'
                    ];
                }
            }
            file_put_contents($userFile, json_encode($userData, JSON_PRETTY_PRINT));
            $result = true;
        }
    }
}
echo json_encode(['result' => $result, 'error' => $error]);
?>
