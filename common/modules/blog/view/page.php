<?php defined('CS__BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| page.php, Назначение: Логика отображения страницы
| Из файла /blog/blog.php
| -------------------------------------------------------------------------
| В этом файле описана базовая функциональность для блога
| работа со статьями, базой данных
|
|
@
@   Cubsystem CMS, (с) 2020
@   Author: Anchovy
@   GitHub: //github.com/Anchovys/cubsystem
@
*/

global $CS;
$segments = cs_get_segment();

// берем сегмент
if($page_link = cs_get_segment(1))
{
    // выбираем страницу по сегменту
    $page = cs_page::getByLink($page_link);

    // вывод RSS ленты по выборке
    if($this->rssFeedShow)
        die(rss_feed_display($page));

    // страница есть
    if($page['count'] > 0)
    {
        // вывод RSS ленты по выборке
        if($this->rssFeedShow)
            die(rss_feed_display($result));

        $set_meta = TRUE;

        // генерируем буфер конкретной страницы
        $buffer = $this->_displayPages($page, 'blog/full-page_view', $set_meta);

        // ставим буфер
        $CS->template->setBuffer('body', $buffer, FALSE);

        // и мета-данные
        if($set_meta)
        {
            $CS->template->setMeta($page['result']->meta);
        }
    }
}