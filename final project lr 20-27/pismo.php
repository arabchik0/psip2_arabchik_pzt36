<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отправка письма</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h1 {
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
        input[type="email"],
        input[type="text"],
        textarea,
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
        <h1>Отправка письма</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $to = $_POST['to'];
            $from = $_POST['from'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // Дополнительные заголовки
            $headers = "From: $from\r\n";
            $headers .= "Reply-To: $from\r\n";
            $headers .= "Content-Type: text/plain;charset=utf-8\r\n";

            // Отправка письма
            $mailSuccess = mail($to, $subject, $message, $headers);

            if ($mailSuccess) {
                echo "<p style='color: green;'>Письмо успешно отправлено.</p>";
            } else {
                echo "<p style='color: red;'>Ошибка при отправке письма.</p>";
            }
        }
        ?>

        <form method="post">
            <label for="to">Кому:</label>
            <input type="email" name="to" required><br>

            <label for="from">От кого:</label>
            <input type="email" name="from" required><br>

            <label for="subject">Тема:</label>
            <input type="text" name="subject" required><br>

            <label for="message">Текст письма:</label>
            <textarea name="message" rows="4" required></textarea><br>

            <input type="submit" value="Отправить">
        </form>
    </div>
</body>
</html>
