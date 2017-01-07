<?php/*
Шаблон статьи ArticleNew
============================
$title - заголовок статьи
$datetime - дата загрузки статьи
$content - текст статьи
*/?>
<article>
    <h2><?php echo $title; ?></h2>
        <span class="red">
            <?php echo $datetime; ?>
            <b>Новость</b>
        </span>
    <p><?php echo $content; ?></p>
</article>
