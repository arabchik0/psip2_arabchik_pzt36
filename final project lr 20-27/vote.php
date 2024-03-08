<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Голосование</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
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
        input[type="radio"],
        input[type="submit"] {
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
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
        <h2>Голосование</h2>
        
        <?php
        // Обработка отправленного голоса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['vote_option'])) {
                $voteOption = $_POST['vote_option'];

                // Считываем текущие результаты из файла
                $file = 'voting_results.txt';
                $results = [];

                if (file_exists($file)) {
                    $results = json_decode(file_get_contents($file), true);
                }

                // Увеличиваем количество голосов для выбранного варианта
                if (isset($results[$voteOption])) {
                    $results[$voteOption]++;
                } else {
                    $results[$voteOption] = 1;
                }

                // Сохраняем обновленные результаты в файл
                file_put_contents($file, json_encode($results));

                echo "Ваш голос учтен!";
            }
        }
        ?>

        <form method="post" action="vote.php">
            <p>Довольны ли вы своей работой?</p>
            <label>
                <input type="radio" name="vote_option" value="option1" required> Да
            </label>
            <label>
                <input type="radio" name="vote_option" value="option2" required> Нет
            </label>
            <label>
                <input type="radio" name="vote_option" value="option3" required> Затрудняюсь ответить
            </label>
            <br>
            <input type="submit" value="Проголосовать">
        </form>

        <h3>Результаты голосования:</h3>
        <?php
        // Выводим текущие результаты
        $file = 'voting_results.txt';
        if (file_exists($file)) {
            $results = json_decode(file_get_contents($file), true);
            foreach ($results as $option => $votes) {
                echo "{$option}: {$votes} голосов<br>";
            }
        } else {
            echo "Результаты голосования будут отображены здесь после первого голосования.";
        }
        ?>
    </div>
</body>
</html>
