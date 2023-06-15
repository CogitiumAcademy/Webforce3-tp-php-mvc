<?php

// Etablissement de la connexion PDO
$dns = 'mysql:host=localhost;dbname=webforce_tp_php';
$utilisateur = 'root';
$motDePasse = '';
$options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try 
{
    global $pdo;
    $pdo = new PDO( $dns, $utilisateur, $motDePasse, $options );
} 
catch ( Exception $e ) 
{
    die("Connexion PDO impossible : ".$e->getMessage());
}	