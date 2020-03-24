<?php  defined('CS__BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| page.php, Назначение: класс страницы - основная единица блога
| -------------------------------------------------------------------------
| В этом файле описан класс страницы, который используется для вывода записи,
| А также, содержатся функции для работы с базой данных
| *** Для работы класса необходим хелпер mysqli_db ***
|
|
@
@   Cubsystem CMS, (с) 2020
@   Author: Anchovy
@   GitHub: //github.com/Anchovys/cubsystem
@
*/

class cs_page
{
    public $id          = null;
    public $title       = null;
    public $tag         = null;
    public $context     = null;
    public $comments    = null;
    public $author      = null;
    public $views       = null;
    public $link        = null;

    function __construct($data = [])
    {
        if(is_array($data))
        {
            if (isset($data['id']))         $this->id = (int)$data['id'];
            if (isset($data['title']))      $this->title = (string)$data['title'];
            if (isset($data['tag']))        $this->tag = (string)$data['tag'];
            if (isset($data['comments']))   $this->comments = (int)$data['comments'];
            if (isset($data['author']))     $this->author = (string)$data['author'];
            if (isset($data['views']))      $this->views = (int)$data['views'];
            if (isset($data['link']))       $this->link = (string)$data['link'];
            if (isset($data['context']))    $this->context = (string)$data['context'];  
        }
        /*
        else if(gettype($params) == gettype($this))
        {
            if (isset($params->id))         $this->id = (int)$params->id;
            if (isset($params->title))      $this->title = (string)$params->title;
            if (isset($params->tag))        $this->tag = (string)$params->tag;
            if (isset($params->comments))   $this->comments = (int)$params->comments;
            if (isset($params->author))     $this->author = (string)$params->author;
            if (isset($params->views))      $this->views = (int)$params->views;
            if (isset($params->link))       $this->link = (string)$params->link;
            if (isset($params->context))    $this->context = (string)$params->context;  
        }
        */
    }

    public function get_by_id($id = FALSE)
    {
        global $CS;
        if(!$id) return;

        if(!$db = $CS->gc('mysqli_db_helper', 'helpers')->getInstance())
                die('[blog] Can`t connect to database');

        $db->where('id', $id);
        
        if($data = $db->getOne('pages'))
            return new cs_page($data);
    }

    public function get_list_by($by = false, $value = false)
    {
        global $CS;

        if(!$db = $CS->gc('mysqli_db_helper', 'helpers')->getInstance())
            die('[blog] Can`t connect to database');

        if($by && is_string($by) && $value)
            $db->where($by, $value);
        
        if(!$result = $db->get('pages'))
            return false;
        
        return
        [
            'count'   =>  count($result),
            'result' =>  $result            
        ];
    }
}
?>