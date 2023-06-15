<?php

//echo date("Y-m-d"); exit;

include('model/player.model.php');
$players = getPlayers();
//var_dump($players); exit;

include('model/game.model.php');
$games = getGames();
//var_dump($games); exit;

include('model/contest.model.php');
$contests = getContests();
//var_dump($contests); exit;

include('view/home.view.php');