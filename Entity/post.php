<?php

class Post {
   
    private $id;
    private $title;
    private $image; 
    private $content;
    private $date_creation;


    // GETTERS
    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return htmlspecialchars($this->title);
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

    public function set_content($content){
        $this->content = $content;
    }

    public function set_date_creation($date_creation){
        $this->date_creation = $date_creation;
    }

}   