<?php
/*
Основной шаблон
============================
$title - заголовок
$content - содержание
*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li>
                <a <?php vHelper_print_if_true('all', $_SESSION['view'], 'red') ?> href="?view=all">Главная</a>
            </li>
            <li>
                <a <?php vHelper_print_if_true('preview', $_SESSION['view'], 'red') ?> href="?view=preview">Статьи в виде превью</a>
            </li>
        </ul>
    </nav>
</header>

<main>

    <h1><?=$title?></h1>
    <div class="page">
        <a <?php vHelper_print_if_true('asc', $_SESSION['sort'], 'red') ?> href="?sort=asc">по возрастанию</a>
        <a <?php vHelper_print_if_true('desc', $_SESSION['sort'], 'red') ?> href="?sort=desc">по убыванию</a>
    </div>

    <section>
        <?=$content?>
    </section>

</main>

<footer>
    <small>Все права защищены. Адрес. Телефон.</small>
</footer>

</body>
</html>
