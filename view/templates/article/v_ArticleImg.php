<?php/*
Шаблон статьи ArticleImg
============================
$title - заголовок статьи
$content - текст статьи
$img - изображение статьи
*/?>
<article>
    <h2><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <img src="<?php echo $img; ?>">
</article>
