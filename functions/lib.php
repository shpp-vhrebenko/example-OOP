<?php

function startup()
{
    // Языковая настройка.
    setlocale(LC_ALL, 'ru_RU.UTF-8');
    mb_internal_encoding('UTF-8');

    // запуск сесси
    session_start();
}

// Подключение шаблона.
function template($fileName, $vars = [])
{
    // Устанавливаем переменные
    extract($vars);

    // Генерация HTML в строку.
    ob_start();
    include $fileName;
    return ob_get_clean();
}

// Функция редиректа
function redirect($url)
{
    header("Location: $url");
    exit;
}

// Функция для проверки ГЕТ запроса, записи его в сессию, значением по умолчанию и массивом с которым будет идти сравнение
// $key - ключ сесси и ГЕТ запроса
// $default - значение по умолчанию
// $array - массив для проверки
function check_and_record($key, $default, $array)
{
    // проверка существования требуемого ГЕТ запроса
    if(isset($_GET[$key])) {

        // проверка пришедшего ГЕТ запроса, осуществляется поиск значения в массиве
        if(in_array($_GET[$key], $array)) {
            $_SESSION[$key] = $_GET[$key];
            redirect($_SERVER['PHP_SELF']);
        }
    }

    // значение по умолчанию
    if($_SESSION[$key] == null) {
        $_SESSION[$key] = $default;
    }
}