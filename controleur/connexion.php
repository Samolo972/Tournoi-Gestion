<?php

session_start();
include '../modele/bd.authentification.inc.php';


$_SESSION["user"] = isset($_POST['user']) ? $_POST['user'] : NULL;
$_SESSION["mdp"] = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;

$id = $_SESSION["user"];
$mdp = $_SESSION["mdp"];

$utilisateurs = liste_utilisateurs();

foreach($utilisateurs as $user)
{
    if($id==$user['user'] && $mdp==$user['pwd'])
    {
        header("Location: ../listemenus.php");
    }
    else
    {
        echo "Identifiant ou mot de passe incorrect. <br><br>";
        echo "<a href='../index.php'> → retour</a>";
        die();
    }
}

?>