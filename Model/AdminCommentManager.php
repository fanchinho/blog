<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class AdminCommentManager extends Manager
{
    
    public function NumberComments($postId)
    {
        $db = $this->dbConnect();
        $number = $db->prepare('SELECT COUNT(*) AS Nbr_comments FROM comment WHERE id_post = ?');
        $number->execute(array($postId));
        $numberComments = $number->fetch();

        return $numberComments;
    }
    
    public function NumberCommentsToModerate($postId)
    {
        $db = $this->dbConnect();
        $number = $db->prepare('SELECT COUNT(*) AS Nbr_comments FROM comment WHERE id_post = ? AND moderate = 1');
        $number->execute(array($postId));
        $numberComments = $number->fetch();

        return $numberComments;
    }
    
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, status, moderate, DATE_FORMAT(date, \'%d/%m/%Y \') AS comment_date FROM comment WHERE id_post = ? ORDER BY date DESC');
        $req->execute(array($postId));
        
        return $req;

    }
   
    public function onlineComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET status = :newStatus WHERE id = :commentId');
        $newStatus = $req->execute(array(
            'commentId' => $commentId,
            'newStatus' => 1,
            ));
        
        return $newStatus;

    }
    public function offlineComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET status = :newStatus WHERE id = :commentId');
        $newStatus = $req->execute(array(
            'commentId' => $commentId,
            'newStatus' => 0,
            ));
        
        return $newStatus;

    }
    public function deleteCommentWithPost($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comment WHERE id_post = ?');
        
        $deleteComments = $comment->execute(array($postId));
        
        return $deleteComments;

    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comment WHERE id = ?');
        
        $deleteComments = $comment->execute(array($commentId));
        
        return $deleteComments;

    }

    public function ignoreComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET moderate = :newStatus WHERE id = :commentId');
        $newStatus = $req->execute(array(
            'commentId' => $commentId,
            'newStatus' => 0,
            ));
        
        return $newStatus;

    }

}
