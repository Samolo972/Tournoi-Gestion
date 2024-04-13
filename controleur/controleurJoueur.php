<?php

//Inclusion du modèle du design paterb MVC
include "../modele/bd.joueur.inc.php";

$id = -1;
$mode = $_POST["mode"];

if(isset($_POST["ajouter"]))
{
    header("Location: ../vue/vueAjoutJoueur.php");
}

if(isset($_POST["modifier"]))
{
    $mode = 2;
}
else if(isset($_POST["supprimer"]))
{
    $mode = 3;
}

//Gestion du cas en fonction du modèle
switch ($mode) {
    case 1: //Insertion d'un étudiant
        // recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
		$date_naiss=$_POST["date_naiss"];
		$licence=$_POST["licence"];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($nom) || empty($prenom) || empty($date_naiss) || empty($licence) )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou date de naissance ou licence n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_joueur($nom, $prenom, $date_naiss, $licence); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location: ../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données";
				// redirection vers la page vue erreur
				header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
    case 2: //Modification d'un étudiant
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
		$id=$_POST["id"];
		$nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
		$date_naiss=$_POST["date_naiss"];
		$licence=$_POST["licence"]; 

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if(  empty($id)|| empty($nom) || empty($prenom) || empty($date_naiss) || empty($licence) )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else 
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_etudiant($id, $nom, $prenom, $date_naiss, $licence);  

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location: ../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
	case 3: //Suppression d'un étudiant
		//Recuperation de la liste 
		if (isset($_POST["supprimer"])) {
			$id = $_POST["id"];
	    }
		echo "La liste des lignes à supprimer : ".$id;  

		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else 
		{
			// appel de fonction de suppression (couche Modele)
			$nb_lignes = delete_joueur($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location: ../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
		break;
}

?>