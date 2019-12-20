<?php
require_once('Model/CommentManager.php');
use \OpenClassRooms\Blog\Model\CommentManager;

class Post {
    private $_idArray;
    private $_idPost;
    private $_date;
    private $_image;
    private $_content;
    private $_status;

    function __construct ($idArray) {
        //$this->_idPost = $idPost;
        //$this->_author = $author;
        //$this->_content = $content;
        $this->_idArray = $idArray;
    }
    public function mail () {
        $this->_idArray['1'] = $this->_mail;
        return  $this->_mail;
    }
    public function Connect () {
        $idPost = $this->_idPost;

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($idPost);
        
        return $comments;
    }
    public function author () {
        $this -> _author = $this->_idArray['1'];
        return $this -> _author;
    }
    public function status () {
        $this -> _status = $this->_idArray['3'];
        return $this -> _status;
    }
    public function imagePost () {
        $this -> _image = $this->_idArray['4'];
        return $this -> _image;
    }
    public function datePost () {
        $this -> _date = $this->_idArray['4'];
        return $this -> _date;
    }
    public function content () {
        $this -> _content = $this->_idArray['2'];
        return $this -> _content;
    }
    public function create () {
        
        
    }
   
}   