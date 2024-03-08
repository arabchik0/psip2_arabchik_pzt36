<?php
require_once 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Преобразуем введенный логин в нижний регистр
    $usernameLower = strtolower($username);

    $sql = "SELECT * FROM users WHERE LOWER(username) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usernameLower);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            // Авторизация успешна
            echo "Пользователь найден";

            // Добавление данных в таблицу userlogin
            $insertSql = "INSERT INTO userlogin (username, password) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ss", $row['username'], $password);
            
            // Проверяем, успешно ли создан объект для подготовленного запроса
            if ($insertStmt !== false) {
                $insertStmt->execute();
                $insertStmt->close();
            } else {
                echo "Ошибка при создании запроса для добавления в userlogin";
            }
        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Пользователь не найден";
    }

    // Проверяем, успешно ли создан объект для подготовленного запроса
    if ($stmt !== false) {
        $stmt->close();
    } else {
        echo "Ошибка при создании запроса для поиска пользователя";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Авторизация</h2>
        <form method="post" action="login.php">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" required><br>

            <label for="password">Пароль:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Войти">
        </form>
    </div>
</body>
</html>
