<?php

//var_dump($_POST);exit;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('model/play.model.php');
    addPlay($_POST);
    header("Location:router.php?page=match&id=" . $_POST['id_contest']);
    exit;
}

if (isset($_GET['id_player'])) {
    include('model/play.model.php');
    removePlay($_GET['id_player'], $_GET['id_contest']);
    header("Location:router.php?page=match&id=" . $_GET['id_contest']);
    exit;
}

include('model/contest.model.php');
$contest = getContest($_GET['id']);
$playersForContest = getPlayersForContest($_GET['id']);
include('model/player.model.php');
$players = getPlayers();


//var_dump($contest);
//var_dump($players);

include('view/viewcontest.view.php');
