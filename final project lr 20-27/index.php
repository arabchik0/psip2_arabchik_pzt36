<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        p {
            text-align: center;
            color: #555;
            margin-bottom: 40px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            margin: 10px 0;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать на сайт!</h1>
        <p>Выберите действие:</p>
        <ul>
            <li><a href="register.php">Зарегистрироваться</a></li>
            <li><a href="login.php">Войти</a></li>
            <li><a href="vote.php">Пройти голосование</a></li>
            <li><a href="pismo.php">Отправить письмо</a></li>
            <li><a href="catalog.php">Каталог продукции</a></li>
            <li><a href="zakaz.php">Оформление заказа</a></li> 
        </ul>
    </div>
</body>
</html>
