// script.js

// Создаем контейнер для примеров
const examplesDiv = document.getElementById("examples");

// Функция для добавления примеров
function addExample(title, code) {
    const exampleDiv = document.createElement("div");
    exampleDiv.innerHTML = `<h3>${title}</h3><p>${code}</p>`;
    examplesDiv.appendChild(exampleDiv);
}

// Примеры регулярных выражений и флагов
addExample("Пример 1: Поиск всех чисел в строке", `const str = "Встречаем числа 123 и 456.789";\nconst numbers = str.match(/\\d+(\\.\\d+)?/g);`);
addExample("Пример 2: Замена всех гласных на '*'", `const text = "Пример текста с гласными";\nconst newText = text.replace(/[aeiouAEIOU]/g, '*');`);
addExample("Пример 3: Проверка наличия цифр в строке", `const input = "Содержит ли строка цифры? 123";\nconst hasDigits = /\\d/.test(input);`);
// и так далее...

// Пример валидации пользовательской формы
const emailInput = document.getElementById("email");
const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

emailInput.addEventListener("blur", function() {
    const email = emailInput.value;
    if (!emailRegex.test(email)) {
        alert("Некорректный email!");
    }
});
