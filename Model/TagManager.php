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
        $tagsPost = $db->prepare('SELECT tag_name FROM tag WHERE id_post = ?');

        $tagsPost->execute(array($postId));
        
        return $tagsPost;
    }
    
    public function TagCreate ($tag) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO tag(tag_name) VALUES(:newTag)');
        $req->execute(array( 'newTag' => $tag));  
        }
    
    //public function linkTag ($tagId) {
    //    $db = $this->dbConnect();
      //  $req = $db->prepare('INSERT INTO tag(tag_name) VALUES(:newTag)');
        //$req->execute(array( 'newTag' => $tag));        
    //}
}
