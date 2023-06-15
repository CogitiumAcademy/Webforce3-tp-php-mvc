<?php

include('model/pdo.inc.php');

function getContests() {
    // Requete select en PDO
    global $pdo;
    try {
        $query = "
        SELECT C.id, title, COUNT(C.id) AS 'Nb players', start_date, nickname
        FROM contest C
        INNER JOIN game G
        ON id_game = G.id
        LEFT JOIN player P
        ON id_player = P.id
        LEFT JOIN play PL
        ON PL.id = C.id
        GROUP BY C.id
        ORDER BY start_date DESC"; 
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

function getContest($id) {
    // Requete select en PDO
    global $pdo;
    try {
        $query = "
        SELECT C.id, title, start_date, nickname
        FROM contest C
        INNER JOIN game G
            ON id_game = G.id
        LEFT JOIN player P
            ON id_player = P.id
        LEFT JOIN play PL
            ON PL.id = C.id
        WHERE C.id = :id"; 
        $curseur = $pdo->prepare($query); 
        $curseur->bindValue(':id', $id, PDO::PARAM_INT);
        $curseur->execute();
        $curseur->setFetchMode(PDO::FETCH_ASSOC);
        $data = $curseur->fetch();
        return $data;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}

function getPlayersForContest($id) {
    // Requete select en PDO
    global $pdo;
    try {
        $query = "
        SELECT PL.id, email, nickname
        FROM contest C
        INNER JOIN play P
          ON P.id = C.id
        INNER JOIN player PL
          ON P.id_player = PL.id
        WHERE C.id = :id";
        $curseur = $pdo->prepare($query); 
        $curseur->bindValue(':id', $id, PDO::PARAM_INT);
        $curseur->execute();
        $curseur->setFetchMode(PDO::FETCH_ASSOC);
        $data = $curseur->fetchAll();
        return $data;
    }
    catch ( Exception $e ) {
        die('Erreur Mysql : '.$e->getMessage());
    }    
}
