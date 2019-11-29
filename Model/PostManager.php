<?php namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class PostManager extends Manager
{
    public function getPosts($currentPage, $limitPost)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC LIMIT '.(($currentPage-1)*$limitPost).', '.$limitPost.'');
        return $req;
    }
    public function lastPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC LIMIT 0,5');
        return $req;
    }
    public function numberPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(id) as NbrPost FROM post');
        
        $data = $req->fetch();

        return $data;
    }
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, image, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post WHERE id = ?');
        $req->execute(array($postId));
        
        $post = $req->fetch();

        return $post;
    }
    public function getAsidePost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC LIMIT 0, 5');
        
        $postAside = $req->fetch();

        return $postAside;
    }
    
}