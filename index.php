<?php
require_once 'functions/lib.php';
require_once 'classes/classes.php';
require_once 'functions/view_helper.php';
startup();

// массивы с доппустимыми значениями
$array_view = ['all', 'preview'];
$array_sort = ['asc', 'desc'];

check_and_record('view', 'all', $array_view);
check_and_record('sort', 'asc', $array_sort);

// Если в $_SESSION['sort'] хранится значение asc, то создаем класс с выводом по порядку
if($_SESSION['sort'] == 'asc') {
    $alist = new ArticleList();
}

// Если в $_SESSION['sort'] хранится значение desc, то создаем класс с выводом в обратном порядке
if($_SESSION['sort'] == 'desc') {
    $alist = new ArticleListDesc();
}

// NewsArticle
$a = new ArticleNews(1, 'Заголовок 1', 'текст 1 текст 1 текст 1 текст 1 текст 1 текст 1');
$alist->add($a);

$a = new ArticleNews(2, 'Заголовок 2', 'текст 2 текст 2 текст 2 текст 2 текст 2 текст 2');
$alist->add($a);

$a = new ArticleNews(3, 'Заголовок 3', 'текст 3 текст 3 текст 3 текст 3 текст 3 текст 3');
$alist->add($a);

// CrossArticle
$a = new ArticleCross(11, 'Заголовок 4', 'текст 4 текст 4 текст 4 текст 4 текст 4 текст 4', 'http://geekbrains.ru/');
$alist->add($a);

$a = new ArticleCross(22, 'Заголовок 5', 'текст 5 текст 5 текст 5 текст 5 текст 5 текст 5', 'http://geekbrains.ru/');
$alist->add($a);

$a = new ArticleCross(33, 'Заголовок 6', 'текст 6 текст 6 текст 6 текст 6 текст 6 текст 6', 'http://geekbrains.ru/');
$alist->add($a);

// ArticleImg
$a = new ArticleImg(111, 'Заголовок 7', 'текст 7 текст 7 текст 7 текст 7 текст 7 текст 7', 'img/facebook.png');
$alist->add($a);

$a= new ArticleImg(222, 'Заголовок 8', 'текст 8 текст 8 текст 8 текст 8 текст 8 текст 8', 'img/forrst.png');
$alist->add($a);

$a = new ArticleImg(333, 'Заголовок 9', 'текст 9 текст 9 текст 9 текст 9 текст 9 текст 9', 'img/twitter.png');
$alist->add($a);

// удаление статьи по ее id
$alist->del(33);

// Если в $_SESSION['view'] хранится значение all, то выводим статьи целиком
if($_SESSION['view'] == 'all') {
    $articles = $alist->view();
}

// Если в $_SESSION['view'] хранится значение preview, то выводим статьи в виде превью
if($_SESSION['view'] == 'preview') {
    $articles = $alist->view('preview');
}

// Заголовок
$title = 'Главная';

// Внутрений шаблон.
$content = template('view/templates/v_index.php', ['articles' => $articles]);

// Внешний шаблон.
$page = template('view/v_main.php', ['title' => $title, 'content' => $content]);

// Вывод.
echo $page;