<?php

//Inclusion du modèle du design paterb MVC
include "../modele/bd.licence.inc.php";

$id = -1;
$mode = $_POST["mode"];

if(isset($_POST["ajouter"]))
{
    header("Location: ../vue/vueAjoutLicence.php");
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
		$numero=$_POST["numero"];
        $categorie=$_POST["categorie"];
		$annee_licence=$_POST["annee_licence"];
		if($_POST["status_licence"] == "valide")
		{	
			$status_licence=1;
		}
		else if($_POST["status_licence"] == "expire")
		{
			$status_licence=0;
		}
		

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($numero) || empty($categorie) || empty($annee_licence) )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou date de naissance ou licence n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_licence($numero, $categorie, $annee_licence, $status_licence); 

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
		$numero=$_POST["numero"];
        $categorie=$_POST["categorie"];
		$annee_licence=$_POST["annee_licence"];
		if($_POST["status_licence"] == "valide")
		{	
			$status_licence=1;
		}
		else if($_POST["status_licence"] == "expire")
		{
			$status_licence=0;
		}

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id) || empty($numero) || empty($categorie) || empty($annee_licence))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else 
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_licence($id, $numero, $categorie, $annee_licence, $status_licence);  

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
			$nb_lignes = delete_licence($id); 

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