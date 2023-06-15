<?php

//var_dump($_POST);
//var_dump($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    include('view/addgame.view.php');

} else {

    // On reçoit un POST qui doit être persisté dans la BD
    //var_dump($_POST);exit;

    // Contrôles coté back
    //var_dump((int)$_POST['min_players']); exit;
    if ((int)$_POST['min_players'] < 2) {
        header("Location:router.php?notif=min_nok");
        exit;
    }
    if ((int)$_POST['max_players'] < (int)$_POST['min_players']) {
        header("Location:router.php?notif=max_nok");
        exit;
    }
    include('model/game.model.php');
    addGame();

    header("Location:router.php#games");
    exit;

}

