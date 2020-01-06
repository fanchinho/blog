<?php
// Chargement des classes
require_once('Model/AdminManager.php');
require_once('Model/AdminPostManager.php');
require_once('Model/AdminCommentManager.php');
require_once('Model/TagManager.php');
require_once('Entity/Post.php');

use \OpenClassRooms\Blog\Model\AdminManager;
use \OpenClassRooms\Blog\Model\AdminPostManager;
use \OpenClassRooms\Blog\Model\AdminCommentManager;
use \OpenClassRooms\Blog\Model\TagManager;




//CONNEXION ET ADMINISTRATION 
function admin ()
{     
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        
        require('view/backend/adminHome.php');

    } 
    else {
        require('view/backend/admin.php');
    }
    
}

function adminConnect ($login, $password) {   
    $dataAdmin = new AdminManager();
    $dataConnection = $dataAdmin -> testConnect($login, $password);
        
    if ($dataConnection == false) {
        
        return false;
    }
    
    else {
        return true;
    }
    
}
function adminHome () {
    $_SESSION['status'] = "connected";
    
    $postManager = new AdminManager();
    $postCommentManager = new AdminCommentManager();

    $adminPost = $postManager -> listPosts();     
    
    require('view/backend/adminHome.php');
    
    //header("Location: index.php?action=admin");
}

function adminDeconnexion ()
{
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") 
    {
        $_SESSION['status'] = "deconnected";
        session_destroy();
        require('view/backend/admin.php');
        
    } else {
        
        require('view/backend/admin.php');
        
    }
}



//ADMINISTRATION DES ARTICLES
//Ajout d'un article
function createPost () {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") 
    {
        require('view/backend/createPost.php');    
    }
    else {
        header("Location: index.php?action=admin");
    }
}

function addPost () {
    
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {  
        
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES["photo"])) 
        {               
            $filename = uploadPhoto($_FILES["photo"]);
            $postManager = new AdminPostManager();

            $post = new Post();
            $post->set_title($_POST['title']);
            $post->set_content($_POST['content']);
            $post->set_image($filename);
            
            //création du post et récupération de l'id du post
            $affectedPost = $postManager->addPost($post);

            //fonction pour la création du tags
            if (!empty($_POST['tags'])) {
                addTags($affectedPost, $_POST['tags']);
            }
            
            header("Location: index.php?action=admin");
        }
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
    }
    
    else {
        header("Location: index.php?action=admin");
    }
}

function addTags ($affectedPost, $tags) {

    $a = explode(',', $tags);

    foreach($a as $v) {
        $tagManager = new TagManager();
        // On compare le nouveau tag avec la base de données de TAGS
        $CompareTag = $tagManager->TagCompare($v);
         if($CompareTag == false) {
            $affectedTag = $tagManager->TagCreate($v);
            //affectation d'un TAG à un article
            TagsBase($affectedPost, $affectedTag);
        }
        else {
            $IdTag = $CompareTag['id'];
            TagsBase($affectedPost, $IdTag);
        }
    }
}

//affectation d'un TAG à un article
function TagsBase ($post, $tag) {
    $tagManager = new TagManager();
    $tagAssociate = $tagManager->TagAssociate($post, $tag);
}

//Suppression d'un article
function advertDelete ($postId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") { 
        
        $postToDeleteManager = new AdminPostManager();
        $post = $postToDeleteManager -> GetPostToAdmin($postId);

        require('view/backend/deletePost.php');
        
    } else {
        
        header("Location: index.php?action=admin");
        
    }
}

function delete ($postId) {
    $postToDeleteManager = new AdminPostManager();
    $CommentToDeleteManager = new AdminCommentManager();
    $TagAssociateManager = new TagManager();

    $deleteAssociate = $TagAssociateManager -> deleteTagAssociate($postId);
    $deletePost = $postToDeleteManager -> deletePost($postId);
    $deleteComments = $CommentToDeleteManager -> deleteCommentWithPost($postId);

    return true;
}

//Modification d'un article
function change ($postId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        $postToDeleteManager = new AdminPostManager();
        $tagToChangeManager = new TagManager();

        $post = $postToDeleteManager -> GetPostToAdmin($postId);
        $tags = $tagToChangeManager -> TagsbyPost($postId);
        require('view/backend/changePost.php');  
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function changePost ($postId, $title, $content) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        $postToChangeManager = new AdminPostManager();
        
        // création de l'objet
        $post = new Post();
        $post->set_id($postId);
        $post->set_title($title);
        $post->set_content($content);

        $post = $postToChangeManager -> changePost($post);
        //fonction pour la création du tags
        if (!empty($_POST['tags'])) {
            addTags($postId, $_POST['tags']);
        }
        return true;
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function changeCompletePost ($postId, $title, $content, $image) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        $postToChangeManager = new AdminPostManager();

        // création de l'objet
        $post = new Post();
        $post->set_id($postId);
        $post->set_title($title);
        $post->set_content($content);
        $post->set_image($image);
        $post = $postToChangeManager -> changeCompletePost($post);

        //fonction pour la création du tags
        if (!empty($_POST['tags'])) {
            addTags($postId, $_POST['tags']);
        }

        return true;
    }
    else {
        header("Location: index.php?action=admin");
    }
}
//Modération des commentaires
function commentsByPost($postId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
    $postToAdmin = new AdminPostManager();
    $commentsToAdmin = new AdminCommentManager();

    $post = $postToAdmin -> GetPostToAdmin($postId);    
    $comments = $commentsToAdmin -> getComments($postId);
    
    require('view/backend/commentsPost.php');  
    }
    else {
        header("Location: index.php?action=admin");
    } 
}
function commentOnLine ($commentId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
    $commentOnLine = new AdminCommentManager();
    $commentStatus = $commentOnLine -> onlineComment($commentId);
    
    return true;
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function commentOffLine ($commentId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
    $commentOffLine = new AdminCommentManager();
    $commentStatus = $commentOffLine -> offlineComment($commentId);
    
    return true;
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function deleteComment ($idPost , $idComment) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
    $deleteComment = new AdminCommentManager();
    $deleteCommentOk = $deleteComment -> deleteComment($idComment);

    header("Location: index.php?action=adminComments&id=".$idPost);
    }
    else {
        header("Location: index.php?action=admin");
    }
}

function ignoreSignal ($idPost , $idComment) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
    $deleteComment = new AdminCommentManager();
    $deleteCommentOk = $deleteComment -> ignoreComment($idComment);

    header("Location: index.php?action=adminComments&id=".$idPost);
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function uploadPhoto($Name) {
    if(isset($Name) && $Name["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "JPG" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $Name["name"];
            $filetype = $Name["type"];
            $filesize = $Name["size"];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 10 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

            // Vérifie le type MIME du fichier
            if(in_array($filetype, $allowed)){
                // Vérifie si le fichier existe avant de le télécharger.
                if(file_exists("upload/" . $Name["name"])){
                    echo $Name["name"] . " existe déjà.";
                } else {
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "Public/images/upload/" . $Name["name"]);
                } 
            } else {
                echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
            }
        } else {
            return false;
            echo "Error: " . $Name["error"];

        }
    return $filename;
}

function pageError ($message) {
    require('view/frontend/error.php');
}