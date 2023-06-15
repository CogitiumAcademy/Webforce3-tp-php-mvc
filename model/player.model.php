<?php

include('model/pdo.inc.php');

function getPlayers() {
    // Requete select en PDO
    global $pdo;
    try {
        $query = "SELECT * FROM player ORDER BY nickname"; 
        $curseur = $pdo->prepare($query); 
        $curseur->execute();
        $curseur->setFetchMode(PDO::FETCH_ASSOC);
        $data = $curseur->fetchAll();
        return $data;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}
