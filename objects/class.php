<?php

namespace OpenClassRooms\Blog\Model;

dans un objet commentaire il faut 
//l'afficher, le modérer
class Comment
{
    $idComment;
    $author;
    $mail;
    $content;
    $postId;

    //modération des commentaires
    public function () {

    }
}


function addComment($postId, $author, $mail, $content)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $mail, $author, $content);

    header("Location: index.php?action=post&id=".$postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        return true;
    }
}
function signalComment($idComment)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->CommentToSIgnal($idComment);

    require('view/frontend/commentSignal.php');
}
function signalBack($idComment)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->signalBack($idComment);

    header("Location: index.php");
}