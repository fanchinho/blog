<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class AdminManager extends Manager
{

    public function testConnect($login, $password)
    {
        $db = $this->dbConnect();
        
        $req = $db->prepare('SELECT * FROM user WHERE login = ? AND password = PASSWORD(?)');
        
        
        $req->execute(array($login, $password));
        $data = $req->fetch();
        return $data;

    }
    public function listPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post ORDER BY date DESC');
        
        return $req;
        
    }
    
    

    public function adminPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM post WHERE id = ?');
        $req->execute(array($postId));
        
        $post = $req->fetch();

        return $post;
    }
    

}