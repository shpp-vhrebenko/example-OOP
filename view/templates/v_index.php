<?php/*
Шаблон главной страницы
============================
$articles - массив с статьями
*/?>
<div class="article">
    <?php
    foreach($articles as $article) {
        echo $article;
    }
    ?>
</div>
