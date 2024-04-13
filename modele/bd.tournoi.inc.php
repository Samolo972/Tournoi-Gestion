<?php

 // fonction qui renvoie un tableau de tous les etudinats
 function obtenir_liste_des_tournoi() 
 {
	// pour connexion au SGBD
	require 'bd.inc.php'; 
	
	$les_tournois = array(); // création du tableau
	$requete="select * from tournoi";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	// si impossible d'exécuter la requête SELECT
	if($resultat_sql == false) 
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error($lien_base));
	}
	else // SELECT réussi
	{
		// compte le nombre de lignes du SELECT
		$nb_lignes = mysqli_affected_rows($lien_base); 
		$i=1; // compteur
		while($i<=$nb_lignes)
		{
			// ajout des résultats du select
			$les_tournois[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
	}
	return $les_tournois;// le tableau sera vide en cas d'erreur
}// fin fonction()


function obtenir_par_id_tournoi($id) // fonction qui renvoie un étudiant
 {
	// pour connexion au SGBD
	require 'bd.inc.php'; 
	
	$tournois = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$tournoi = array(); // tableau pour extraire le 1er etudiant trouvé
	
	$requete="SELECT * FROM tournoi WHERE id=$id";
	
	$resultat_sql = mysqli_query($lien_base, "$requete");
	
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
		$tournois[] = mysqli_fetch_array($resultat_sql);
		$tournoi = $tournois[0];
	}
	return $tournoi;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_tournoi( $nom, $ville, $date_tournoi) // insere un nouveau etudiant  dans la table etudiants
{
	// fichier externe car la connexion est utilisée dans différentes pages
	require 'bd.inc.php'; 
	
	// initialisation de la variable à zéro
	$nb_lignes = 0; 
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO tournoi (nom, ville, date_tournoi) VALUES ('$nom','$ville','$date_tournoi');";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur = mysqli_query($lien_base, "$requete");
	
	// si false : impossible d'exécuter la requête INSERT
	if($reponse_serveur == false) 
	{	
		$message_erreur = "Impossible d'executer la requete: $requete".mysqli_error($lien_base);
		die();
		header("Location:../vue/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction insert_etudiant

function delete_tournoi($id) {
    require 'bd.inc.php'; 
    $nb_lignes = 0; 
    $requete = "DELETE FROM tournoi WHERE id = ?";
    $stmt = mysqli_prepare($lien_base, $requete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $reponse_serveur = mysqli_stmt_execute($stmt);
    if(!$reponse_serveur) {	
        $message_erreur = "Impossible d'executer la requete: $requete".mysqli_error($lien_base);
        header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
        exit();
    } else {
        $nb_lignes = mysqli_stmt_affected_rows($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($lien_base);
    return $nb_lignes;
}


function update_tournoi($id, $nom, $ville, $date_tournoi) {
	// fichier externe car la connexion est utilisée dans différentes pages
	require 'bd.inc.php'; 
	
	$nb_lignes = 0; // initialisation de la variable à zéro
	
	// Requete de modification MYSQL. 
	$requete = "UPDATE tournoi SET nom = '$nom', ville = '$ville', date_tournoi = '$date_tournoi' WHERE id = '$id'";
	// Il y a une apostrophe de trop à la fin de la requête. Cela va générer une erreur de syntaxe.
	
	// tentative d'exécution de la requete UPDATE dans la base
	$reponse_serveur = mysqli_query($lien_base, $requete);
	if ($reponse_serveur == false) {
		$message_erreur = "Impossible d'exécuter la requête : $requete " . mysqli_error($lien_base);
		// Plutôt que de tuer le script avec die(), mieux vaut rediriger l'utilisateur vers une page d'erreur.
		header("Location:../vue/vue_erreur.php?erreur=$message_erreur");
		exit(); // interruption de la fonction après redirection
	}
	else {
		$nb_lignes = mysqli_affected_rows($lien_base);
	}
	return $nb_lignes; // renvoie le nb de lignes modifiées : normalement 1
} // fin fonction update_tournoi


?>