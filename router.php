<?php

//echo 'Router';

//var_dump($_GET);

if (!isset($_GET['page'])) {
    include('controller/home.ctrl.php');
} else {
    switch ($_GET['page']) {
        case 'addgame':
            include('controller/addgame.ctrl.php');
            break;
        case 'addplayer':
            include('controller/addplayer.ctrl.php');
            break;
        case 'addcontest':
            include('controller/addcontest.ctrl.php');
            break;
        case 'match':
            include('controller/viewcontest.ctrl.php');
            break;
        default:
            echo "Page 404";
    }
}
