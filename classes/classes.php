<?php

// абстрактный родительский класс статьи
abstract class Article
{
    protected $id;          // идентификатор
    protected $title;       // заголовок статьи
    protected $content;     // тест статьи
    protected $preview;     // короткое описание статьи

    // конструктор
    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->preview = mb_substr($content, 0, 15);
    }

    // функция для вывода статей
    public abstract function view();

    // функция получения id статьи
    public function getId()
    {
        return $this->id;
    }
}

class ArticleNews extends Article
{
    protected $datetime;    // дата

    public function __construct($id, $title, $content)
    {
        parent::__construct($id, $title, $content);
        $this->datetime = time();
    }

    public function view($preview = '')
    {
        $format = '%d.%m.%y';   // формат даты

        // если в методе view $preview равно preview, то в $this->content записываем $this->preview(короткое описание статьи)
        if($preview == 'preview') {
            $this->content = $this->preview;
        }
        $article = template('view/templates/article/v_ArticleNews.php', [
            'id' => $this->id, 'title' => $this->title,
            'content' => $this->content, 'datetime' => strftime($format, $this->datetime)]);
        return $article;
    }
}

class ArticleCross extends Article
{
    protected $source;      // источник статьи

    public function __construct($id, $title, $content, $source)
    {
        parent::__construct($id, $title, $content);
        $this->source = $source;
    }

    public function view($preview = '')
    {
        // если в методе view $preview равно preview, то в $this->content записываем $this->preview(корокое описание статьи)
        if($preview == 'preview') {
            $this->content = $this->preview;
        }
        $article = template('view/templates/article/v_ArticleCross.php', [
            'id' => $this->id, 'title' => $this->title,
            'content' => $this->content, 'source' => $this->source]);
        return $article;
    }
}

class ArticleImg extends Article
{
    protected $img;     // изображение статьи

    public function __construct($id, $title, $content, $img)
    {
        parent::__construct($id, $title, $content);
        $this->img = $img;
    }

    public function view($preview = '')
    {
        // если в методе view $preview равно preview, то в $this->content записываем $this->preview(корокое описание статьи)
        if($preview == 'preview') {
            $this->content = $this->preview;
        }
        $article = template('view/templates/article/v_ArticleImg.php', [
            'id' => $this->id, 'title' => $this->title,
            'content' => $this->content, 'img' => $this->img]);
        return $article;
    }
}


interface IArticleList
{
    public function add(Article $article);
    public function del($id);
    public function view();
}

class ArticleList implements IArticleList
{
    protected $alist;
    protected $array;

    // Добавление статей
    public function add(Article $article)
    {
        $this->alist[$article->getId()] = $article;
    }

    // Удаление статьи
    public function del($id)
    {
        unset($this->alist[$id]);
    }

    // Вывод статей
    public function view($preview = '')
    {
        foreach($this->alist as $article) {
            $this->array[] = $article->view($preview);
        }
        return $this->array;
    }
}

class ArticleListDesc extends ArticleList implements IArticleList
{
    // Вывод статей
    public function view($preview = '')
    {
        foreach(array_reverse($this->alist) as $article) {
            $this->array[] = $article->view($preview);
        }
        return $this->array;
    }
}


