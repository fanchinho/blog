<?php
// Chargement des classes
require_once('Model/AdminManager.php');
require_once('Model/AdminPostManager.php');
require_once('Model/AdminCommentManager.php');
require_once('Model/TagManager.php');


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
            if (!empty($_POST['tags'])) {
                addTags($_POST['tags']);
            }
            
            $filename = uploadPhoto($_FILES["photo"]);
            $postManager = new AdminPostManager();

            $affectedPost = $postManager->addPost($_POST['title'], $_POST['content'], $filename);
            
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

function addTags ($tags) {
    $a = explode(',', $tags);
        
    foreach($a as $v) {
        $tagManager = new TagManager();
        $AddTag = $tagManager->TagCreate($v);
    }
}

function linkTags () {
        $tagManager = new TagManager();
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

    $deletePost = $postToDeleteManager -> deletePost($postId);
    $deleteComments = $CommentToDeleteManager -> deleteCommentWithPost($postId);
    
    return true;
}

//Modification d'un article
function change ($postId) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        $postToDeleteManager = new AdminPostManager();
        $post = $postToDeleteManager -> GetPostToAdmin($postId);

        require('view/backend/changePost.php');  
    }
    else {
        header("Location: index.php?action=admin");
    }
}
function changePost ($postId, $title, $content, $image) {
    if(isset($_SESSION['status']) && $_SESSION['status']=="connected") {
        $postToChangeManager = new AdminPostManager();
        $post = $postToChangeManager -> changePost($postId, $title, $content, $image);

        return true;
    }
    else {
        header("Location: index.php?action=admin");
    }
}

//Modération des commentaires
function commentsByPost($postId) {
    $postToAdmin = new AdminPostManager();
    $commentsToAdmin = new AdminCommentManager();

    $post = $postToAdmin -> GetPostToAdmin($postId);    
    $comments = $commentsToAdmin -> getComments($postId);
    
    require('view/backend/commentsPost.php');    
}
function commentOnLine ($commentId) {
    $commentOnLine = new AdminCommentManager();
    $commentStatus = $commentOnLine -> onlineComment($commentId);
    
    return true;
}
function commentOffLine ($commentId) {
    $commentOffLine = new AdminCommentManager();
    $commentStatus = $commentOffLine -> offlineComment($commentId);
    
    return true;
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

            echo "Error: " . $Name["error"];

        }
    return $filename;
}
