<?php
//namespace OpenClassRooms\Blog\Entity;
//require_once('Model/CommentManager.php');
//require_once("Entity/Hydrate.php");
//use \OpenClassRooms\Blog\Model\CommentManager;

class Post {
   
    private $id;
    private $title;
    private $image; 
    private $content;
    private $date_creation;
 
  

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

    public function get_title(){
        return $this->title;
    }

    public function get_image(){
        return $this->image;
    }

    public function get_content(){
        return $this->content;
    }

    public function get_date_creation(){
        return $this->date_creation;
    }



   // SETTERS
    public function set_id($id){
        $this->id = $id;
    }

    public function set_title($title){
        $this->title = $title;
    }

    public function set_image($image){
        $this->image = $image;
    }

    public function set_content($author){
        $this->author = $author;
    }

    
    public function set_date_creation($date_creation){
        $this->date_creation = $date_creation;
    }

}   