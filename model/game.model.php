<?php

include('model/pdo.inc.php');

function getGames() {
    // Requete select en PDO
    global $pdo;
    try {
        $query = "SELECT * FROM game ORDER BY title"; 
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

function addGame() {
    // Requete insert en PDO
    global $pdo;
    try {
        $query = "
        INSERT INTO game 
            (title, min_players, max_players) 
        VALUES 
            (:title, :min_players, :max_players)"; 
        $curseur = $pdo->prepare($query); 

        $curseur->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $curseur->bindValue(':min_players', $_POST['min_players'], PDO::PARAM_INT);
        $curseur->bindValue(':max_players', $_POST['max_players'], PDO::PARAM_INT);

        $curseur->execute();
        return true;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}
