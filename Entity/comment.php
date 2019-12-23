<?php
use \OpenClassRooms\Blog\Model\CommentManager;

class Comment{
   
    private $id;
    private $mail;
    private $comment_date; 
    private $content;
    private $status;
    private $moderate;
    private $id_post;
    private $author;
 
  

    /*
    public function __construct ($_idArray,$_idPost,$_date,$_author,$_content,$_mail,$_status) {
        $this->_idArray = $_idArray;
        $this->_idPost = $_idPost;
        $this->_author = $_author;
        $this->_content = $_content;
        $this->_date = $_date;
        $this->_mail = $_mail;
        $this->_status = $_status;
    }*/
     /*
    public function mail () {
        $this->_idArray['1'] = $this->_mail;
        return  $this->_mail;
    }
   public function Connect () {
        $idPost = $this->_idPost;

        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($idPost);
        
        return $comments;
    }*/


    // GETTERS
    public function get_id(){
        return $this->id;
    }

    public function get_mail(){
        return $this->mail;
    }

    public function get_comment_date(){
        return $this->comment_date;
    }

    public function get_content(){
        return $this->content;
    }

    public function get_status(){
        return $this->status;
    }

    public function get_moderate(){
        return $this->moderate;
    }

    public function get_id_post(){
        return $this->id_post;
    }

    public function get_author(){
        return $this->author;
    }



   // SETTERS
    public function set_idArray($id){
        $this->id = $id;
    }

    public function set_idPost($idPost){
        $this->idPost = $idPost;
    }

    public function set_date($date){
        $this->date = $date;
    }

    public function set_author($author){
        $this->author = $author;
    }

    
    public function set_content($content){
        $this->content = $content;
    }

    public function set_mail($mail){
        $this->mail = $mail;
    }

    public function set_status($status){
        $this->status = $status;
    }
   
}   