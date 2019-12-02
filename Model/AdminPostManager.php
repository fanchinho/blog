<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class AdminPostManager extends Manager
{
// GESTION DE LA CREATION, administration DE POSTS
    public function addPost ($title, $content, $filename)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO post(title, content, image, date) VALUES(?, ?, ?, NOW())');
        
        $affectedPost = $post->execute(array($title, $content, $filename));
                
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
    

    public function changeCompletePost ($postId, $title, $content, $image)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :newTitle, content = :newContent, image = :newImage WHERE id = :postId');
        $newPost = $post->execute(array(
            'postId' => $postId,
            'newTitle' => $title,
            'newContent' => $content,
            'newImage' => $image,
            ));
        
        return $newPost;

    }
    public function changePost ($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :newTitle, content = :newContent WHERE id = :postId');
        $newPost = $post->execute(array(
            'postId' => $postId,
            'newTitle' => $title,
            'newContent' => $content,
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