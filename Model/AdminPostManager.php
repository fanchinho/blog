<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");
require_once("Entity/Post.php");

class AdminPostManager extends Manager
{
// GESTION DE LA CREATION, administration DE POSTS
    public function addPost ($postObject)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO post(title, content, image, date) VALUES(?, ?, ?, NOW())');

        $affectedPost = $post->execute(array($postObject->get_title(), $postObject->get_content(), $postObject->get_image()));
                
        $newIdPost = $db->lastInsertId();

        return $newIdPost;
    }
    
    
    public function GetPostToAdmin ($postId)
    {
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, content, image, title FROM post WHERE id = ?');
        $req->execute(array($postId));
        
        $post = $req->fetch();

        return $post;
    }
    

    public function changeCompletePost ($postObject)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :newTitle, content = :newContent, image = :newImage WHERE id = :postId');
        $newPost = $post->execute(array(
            'postId' => $postObject->get_id(),
            'newTitle' => $postObject->get_title(),
            'newContent' => $postObject->get_content(),
            'newImage' => $postObject->get_image(),
            ));
        
        return $newPost;

    }
    public function changePost ($postObject)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :newTitle, content = :newContent WHERE id = :postId');
        $newPost = $post->execute(array(
            'postId' => $postObject->get_id(),
            'newTitle' => $postObject->get_title(),
            'newContent' => $postObject->get_content(),
            ));
        
        return $newPost;

    }
    

    public function deletePost ($postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM post WHERE id = ?');
        
        $deletePost = $post->execute(array($postId));
        
        return $deletePost;

    }
    
    
}