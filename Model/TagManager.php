<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class TagManager extends Manager
{
    public function getTags()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM tag LIMIT 0,20');

        return $req;
    }
    public function TagsbyPost($postId)
    {
        $db = $this->dbConnect();
        $tagsPost = $db->prepare('SELECT * FROM `TagsPost` t1,`tag` t2 WHERE t1.idTag=t2.id AND t1.idPost=?');

        $tagsPost->execute(array($postId));
        
        return $tagsPost;
    }
    public function getPostsByTag($currentPage, $limitPost, $idTag)
    {
        $db = $this->dbConnect();
        $PostsTag = $db->prepare('SELECT id, title, image, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_creation FROM `TagsPost` t1,`post` t2 WHERE t1.idPost=t2.id AND t1.idTag = ? ORDER BY date DESC LIMIT '.(($currentPage-1)*$limitPost).', '.$limitPost.'');
        $PostsTag->execute(array($idTag));
        
        return $PostsTag;
    }  
    public function numberPostsByTag($tag)
    {
        $db = $this->dbConnect();
        $numberPostsTag = $db->prepare('SELECT COUNT(idPost) as NbrPost FROM TagsPost WHERE `idTag` = ?');
        $numberPostsTag->execute(array($tag));

        $data = $numberPostsTag->fetch();

        
        return $data;
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
    public function deleteTagAssociate($postId)
    {
        $db = $this->dbConnect($postId);
        $deleteAssociatePost = $db->prepare('DELETE TagsPost.IdPost FROM TagsPost WHERE idPost = ?');

        $deleteAssociatePost->execute(array($postId));
        
        return $deleteAssociatePost;
    }
}
