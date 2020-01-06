<?php
use \OpenClassRooms\Blog\Model\CommentManager;

class Comment {
   
    private $id;
    private $mail;
    private $comment_date; 
    private $content;
    private $status;
    private $moderate;
    private $idPost;
    private $author;

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

    public function get_idPost(){
        return $this->idPost;
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