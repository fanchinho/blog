<?php
require_once('Model/CommentManager.php');
use \OpenClassRooms\Blog\Model\CommentManager;

class Comment {

    private $_idPost;
    private $_author;
    private $_content;
    private $_mail;

    function __construct ($idPost, $author, $content, $mail) {
        $this->_idPost = $idPost;
        $this->_author = $author;
        $this->_content = $content;
        $this->_mail = $mail;
    }

    public function Content () {
        echo "voila l'article".$this->_idPost;
    }

    public function Connect () {
        $idPost = $this->_idPost;

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($idPost);
        
        return $comments;
    }

    public function test ($comment) {
        while ($comment = $comments->fetch()) {
            echo $comment['author'];
            echo $comment['content'];
        }
        
        $comments->closeCursor();
    }
   
}   