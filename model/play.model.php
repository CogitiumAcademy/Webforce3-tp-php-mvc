<?php

include('model/pdo.inc.php');

function addPlay($play) {
    // Requete insert en PDO
    global $pdo;
    try {
        $query = "
        INSERT INTO play 
            (id, id_player) 
        VALUES 
            (:id_contest, :id_player)"; 
        $curseur = $pdo->prepare($query); 

        $curseur->bindValue(':id_contest', $play['id_contest'], PDO::PARAM_INT);
        $curseur->bindValue(':id_player', $_POST['id_player'], PDO::PARAM_INT);

        $curseur->execute();
        return true;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}

function removePlay($id_player, $id_contest) {
    // Requete delete en PDO
    global $pdo;
    try {
        $query = "
        DELETE FROM play
        WHERE id = :id_contest
            AND id_player = :id_player"; 
        $curseur = $pdo->prepare($query); 

        $curseur->bindValue(':id_contest', $id_contest, PDO::PARAM_INT);
        $curseur->bindValue(':id_player', $id_player, PDO::PARAM_INT);

        $curseur->execute();
        return true;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}
