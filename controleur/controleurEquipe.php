<?php

include '../modele/bd.equipe.inc.php';

$id = -1;
$mode = $_POST["mode"];

if(isset($_POST["ajouter"]))
{
    header("Location: ../vue/vueAjoutEquipe.php");
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
		$nomEquipe=$_POST["teamname"];
		$AnneeCreation=$_POST["anneeCreation"];
		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($nomEquipe)|| empty($AnneeCreation)  )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ nom ou prénom ou la date entree ou classe ou moyenne n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes=insert_equipe($nomEquipe,$AnneeCreation); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de l'insertion des données";
				// redirection vers la page vue erreur
				header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
    case 2: //Modification d'un étudiant
		// recuperation des variables du formulaire de annuaire1.php par le tableau associatif $_POST
        $id=$_POST["id"];
		$nomEquipe=$_POST["nomEquipe"];
		$AnneeCreation=$_POST["anneeCreation"];
		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($nomEquipe)|| empty($AnneeCreation)  )  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero ou autres n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $numero, $nom, $prenom, $date_entree, $classe et $moyenne sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = update_equipe($id,$nomEquipe,$AnneeCreation);  

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
        break;
	case 3: //Suppression d'un étudiant
		//Recuperayion de la liste 
		if (isset($_POST["id"])) {
			$id = $_POST["id"];
	    }
		echo "La liste des lignes à supprimer : ".$id;  

		// Vérification des champs numero, nom, classe et moyenne (si il ne sont pas vides ?)
		if( empty($id))  // le signe || signifie OU
		{
			$message_erreur="ATTENTION : Le champ numero n'a pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			exit(); // interruption après redirection
		}
		else // $nom et $prenom sont corrects  
		{
			// appel de fonction d'insertion (couche Modele)
			$nb_lignes = delete_equipe($id); 

			// on a inséré 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../vue/vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de suppression des données";
				// redirection vers la page vue erreur
				header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
			}		
		} // fin si empty nom
		break;
}
?>
