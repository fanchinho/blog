<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class TagManager extends Manager
{
    public function getTags()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT tag_name FROM tag LIMIT 0,20');

        return $req;
    }
    public function TagsbyPost($postId)
    {
        $db = $this->dbConnect();
        $tagsPost = $db->prepare('SELECT tag_name FROM `TagsPost` t1,`tag` t2 WHERE t1.idTag=t2.id AND t1.idPost=?');

        $tagsPost->execute(array($postId));
        
        return $tagsPost;
    }

   

    public function TagCompare ($tag) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id FROM tag WHERE tag_name = ?');
        $req->execute(array($tag));
        
        $data = $req->fetch();
        return $data;
    }
    public function TagCreate ($tag) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO tag(tag_name) VALUES(:newTag)');

        $affectedTag = $req->execute(array('newTag' => $tag));  

        $newIdTag = $db->lastInsertId();
        return $newIdTag;
    } 
    public function TagAssociate ($post, $tag) {
        $db = $this->dbConnect();
        $tags = $db->prepare('INSERT INTO TagsPost(idPost, idTag) VALUES(?, ?)');
        $tagAssociate = $tags->execute(array($post, $tag));
    }       
}
