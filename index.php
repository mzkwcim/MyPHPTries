<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./2.css">
    <title>Document</title>
</head>
<body>
    <H1>Logowanie</H1>
    <form action="index.php" method="post">
        <label>username</label><br>
        <input type="text" name="username"><br>
        <label>password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $containsUppercase = preg_match('/[A-Z]/', $password);
        $containsLowercase = preg_match('/[a-z]/', $password);
        $containsDigit = preg_match('/\d/', $password);
        $containsSpecialChar = preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password);
        $hasMinLength = strlen($password) >= 12;

        if ($username == ""){
            echo "wprowadź swoją nazwę użytkownika<br>";
        }

        if (!$containsUppercase) {
            $errorMessages[] = "Brak wielkiej litery w haśle.";
        }

        if (!$containsLowercase) {
            $errorMessages[] = "Brak małej litery w haśle.";
        }

        if (!$containsDigit) {
            $errorMessages[] = "Brak cyfry w haśle.";
        }

        if (!$containsSpecialChar) {
            $errorMessages[] = "Brak znaku specjalnego w haśle.";
        }

        if (!$hasMinLength) {
            $errorMessages[] = "Hasło jest zbyt krótkie, wymagane są co najmniej 12 znaków.";
        }

        // Wyświetlenie komunikatów błędów
        if (!empty($errorMessages)) {
            foreach ($errorMessages as $errorMessage) {
                echo $errorMessage . "<br>";
            }
        } else {
            echo "Witaj {$username}, twoje hasło spełnia wszystkie wymagania.";
        }
    }
?>
