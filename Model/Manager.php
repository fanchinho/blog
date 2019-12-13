<?php

namespace OpenClassRooms\Blog\Model;

class Manager
{
    private $bdd;

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;        
    }
    

    protected function executerRequete($sql, $params = null) {
    if ($params == null) {
        $resultat = $this->getBdd()->query($sql);    // exécution directe
    }
    else {
        $resultat = $this->getBdd()->prepare($sql);  // requête préparée
        $resultat->execute($params);
    }
    return $resultat;
    }
}