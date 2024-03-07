<!-- constants_variables_script.php -->
<?php
// Создание константы
define("NUM_E", 2.71828);

// Вывод значения константы
echo "Число e равно " . NUM_E . "<br>";

// Присвоение переменной значения константы и вывод типа переменной
$num_e1 = NUM_E;
echo "Тип переменной \$num_e1: " . gettype($num_e1) . "<br>";

// Преобразование типа переменной и вывод нового типа и значения
$num_e1 = (string)$num_e1;
echo "Тип переменной \$num_e1: " . gettype($num_e1) . ", Значение: " . $num_e1 . "<br>";

$num_e1 = (int)$num_e1;
echo "Тип переменной \$num_e1: " . gettype($num_e1) . ", Значение: " . $num_e1 . "<br>";

$num_e1 = (bool)$num_e1;
echo "Тип переменной \$num_e1: " . gettype($num_e1) . ", Значение: " . $num_e1 . "<br>";
?>
