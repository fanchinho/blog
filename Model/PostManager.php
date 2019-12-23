<?php 

namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");
require_once("Entity/Post.php");

class PostManager extends Manager
{
    public function getPosts($currentPage=1, $limitPost=5)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC LIMIT '.(($currentPage-1)*$limitPost).', '.$limitPost.'');
        $req->execute(array($currentPage=1, $limitPost=5));

        $posts = $req->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Post');
        
        return $posts;

    }
    public function lastPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC LIMIT 0,4');
        $lastposts = $req->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Post');
   
        return $lastposts;
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
        $post = $req->fetchObject('Post');
        
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