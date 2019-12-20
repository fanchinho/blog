<?php
namespace OpenClassRooms\Blog\Entity;
//require_once('Model/CommentManager.php');
//use \OpenClassRooms\Blog\Model\CommentManager;

class Comment {
    private $_idArray;
    private $_idPost;
    private $_date;
    private $_author;
    private $_content;
    private $_mail;
    private $_status;

    function __construct ($comment) {
        //$this->_idPost = $idPost;
        //$this->_author = $author;
        //$this->_content = $content;
        $this->_comment = $comment;
    }
    public function mail () {
        $this->_idArray['1'] = $this->_mail;
        return  $this->_mail;
    }
    /*public function Connect () {
        $idPost = $this->_idPost;

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($idPost);
        
        return $comments;
    }*/
    public function author () {
        $this -> _author = $this->_comment['author'];
        return $this -> _author;
    }
    public function status () {
        $this -> _status = $this->_comment['status'];
        return $this -> _status;
    }
    public function dateComment () {
        $this -> _date = $this->_comment['comment_date'];
        return $this -> _date;
    }
    public function content () {
        $this -> _content = $this->_comment['content'];
        return $this -> _content;
    }
   
   
}   