<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Политика конфиденциальности</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
    </style>

</head>
<body>
<div class="container">
    <h1>Политика конфиденциальности</h1>
    <p>Настоящая политика конфиденциальности описывает, как мы собираем, используем и защищаем вашу личную информацию.</p>

    <h2>1. Собираемая информация</h2>
    <ul>
        <li>Имя</li>
        <li>Email адрес</li>
        <li>Номер телефона (по желанию)</li>
        <li>Сообщение</li>
    </ul>

    <h2>2. Использование информации</h2>
    <p>Информация используется исключительно для обратной связи и ответа на ваши запросы.</p>

    <h2>3. Защита данных</h2>
    <p>Мы принимаем соответствующие меры безопасности для защиты вашей личной информации.</p>

    <h2>4. Контакты</h2>
    <p>По вопросам конфиденциальности: {{ config('mail.from.address', 'admin@example.com') }}</p>

    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Вернуться назад</a>
</div>
</body>
</html>
