<?php/*
Шаблон статьи ArticleNCross
============================
$title - заголовок статьи
$content - текст статьи
$source - ссылка на источник статьи
*/?>
<article>
    <h2><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <small><a href="<?php echo $source; ?>"><?php echo $source; ?></a></small>
</article>
