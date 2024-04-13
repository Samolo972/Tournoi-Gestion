<?php

//Inclusion du modèle du design paterb MVC
include "../modele/bd.match.inc.php";

$id = -1;
$mode = $_POST["mode"];

if(isset($_POST["ajouter"]))
{
    header("Location: ../vue/vueAjoutMatch.php");
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
		$date_match=$_POST["date_match"];
        $id_tournoi=isset($_POST["id_tournoi"]) ? $_POST["id_tournoi"] : NULL;
		$equipe1=isset($_POST["id_equipe1"]) ? $_POST["id_equipe1"] : NULL;
		$equipe2=isset($_POST["id_equipe2"]) ? $_POST["id_equipe2"] : NULL;
		$score1=isset($_POST["score1"]) ? $_POST["score1"] : NULL;
		$score2=isset($_POST["score2"]) ? $_POST["score2"] : NULL;
		if($_POST["tir_but"]=="oui")
		{
			$tir_but = 1;
			if(isset($_POST["score3"]) && isset($_POST["score4"]))
			{
				$score3 = $_POST["score3"];
				$score4 = $_POST["score4"];
			}
			else
			{
				$score3 = "";
				$score4 = "";
			}
		}
		else if($_POST["tir_but"]=="non")
		{
			$tir_but = 0;
		}
		$vainqueur=isset($_POST["id_vainqueur"]) ? $_POST["id_vainqueur"] : NULL;

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($date_match) || empty($id_tournoi) || empty($equipe1) || empty($equipe2) || empty($score1) 
		|| empty($score2) || empty($vainqueur))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Les champs n'ont pas été remplis correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)

			$nb_lignes=insert_match($date_match, $id_tournoi, $equipe1, $equipe2, $score1, $score2, $tir_but, $score3, $score4, $vainqueur); 
			
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
		$id = $_POST['id'];			
		$date_match = $_POST['date_match'];
        $id_tournoi = $_POST['id_tournoi'];
        $equipe1 = $_POST['id_equipe1'];
        $equipe2 = $_POST['id_equipe2'];
        $score1 = $_POST['score1'];
    	$score2 = $_POST['score2'];
        if($_POST["tir_but"]=="oui")
		{
			$tir_but = 1;
			if(isset($_POST["score3"]) && isset($_POST["score4"]))
			{
				$score3 = $_POST["score3"];
				$score4 = $_POST["score4"];
			}
			else
			{
				$score3 = "";
				$score4 = "";
			}
		}
		else if($_POST["tir_but"]=="non")
		{
			$tir_but = 0;
		}
		$vainqueur = $_POST['id_vainqueur'];

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if(  empty($id)|| empty($date_match) || empty($id_tournoi) || empty($equipe1) || empty($equipe2) || empty($score1) || empty($score2)
		|| empty($vainqueur))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ id ou autres n'ont pas été remplis correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location: ../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else 
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_match($id, $date_match, $id_tournoi, $equipe1, $equipe2, $score1, $score2, $tir_but, $score3, $score4, $vainqueur); 

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
	case 3: //Suppression d'un match
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
			$nb_lignes = delete_match($id); 

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