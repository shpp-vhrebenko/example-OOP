<?php

// Функция для изменения цвета нажатой ссылки. Принимает два параметра для сравнения и название класса(css),
// при совпадении выводит класс
function vHelper_print_if_true($value1, $value2, $color)
{
    if($value1 == $value2) {
        echo 'class="' . $color . '"';
    }
}