<?php
// fonction qui renvoie un tableau de tous les joueurs
function obtenir_liste_des_matchs() 
{
   // pour connexion au SGBD
   require 'bd.inc.php'; 
   
   $les_matchs = array(); // création du tableau

   $requete="select m.id as id_match, m.date_match as date_match,
   t.nom as nom_tournoi,(select DISTINCT nom from equipe e where e.id = m.id_equipe1) as equipe1, 
   (select DISTINCT nom from equipe e where e.id = m.id_equipe2) as equipe2, m.score1 as score1,
   m.score2 as score2, m.tir_but as tir_but, m.score3 as score3, m.score4 as score4,
   (select DISTINCT nom from equipe e where e.id = m.id_vainqueur) as vainqueur from matchs m 
   join tournoi t on m.id_tournoi = t.id";
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
           $les_matchs[] = mysqli_fetch_array($resultat_sql); 
           $i=$i+1; // incrémentation
       }
   }
   return $les_matchs;// le tableau sera vide en cas d'erreur
}// fin fonction()

function obtenir_par_id_match($id) // fonction qui renvoie un match
{
   // pour connexion au SGBD
   require 'bd.inc.php'; 
   
   $matchs = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
   $match = array(); // tableau pour extraire le 1er joueur trouvé
   
   $requete="select * from matchs where id=$id";
   
   $resultat_sql = mysqli_query($lien_base, "$requete");
   
   if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
   {	
       die("Impossible d'executer la requete: $requete".mysqli_error($lien_base));
   }
   else // SELECT réussi : il ne peut y avoir qu'un joueur
   {
       $matchs[] = mysqli_fetch_array($resultat_sql);
       $match = $matchs[0];
   }
   return $match;// le tableau sera vide en cas d'erreur
}// fin fonction()

// page contenant les différentes fonctions d'accès à la base
//_______________________________________________________________
function insert_match($date_match, $id_tournoi, $id_equipe1, $id_equipe2,
$score1, $score2, $tir_but, $score3, $score4, $id_vainqueur) // insere un nouveau etudiant  dans la table joueur
{
   // fichier externe car la connexion est utilisée dans différentes pages
   require 'bd.inc.php'; 
   
   // initialisation de la variable à zéro
   $nb_lignes = 0; 

   // Requete d'insertion MYSQL. 
   if(!$score3 && !$score4)
   {
    $requete= "insert into matchs (date_match, id_tournoi, id_equipe1, id_equipe2,
    score1, score2, tir_but, score3, score4, id_vainqueur) VALUES ('$date_match','$id_tournoi','$id_equipe1','$id_equipe2',
   '$score1','$score2','$tir_but', NULL, NULL,'$id_vainqueur');";
   }
   else
   {
    $requete= "insert into matchs (date_match, id_tournoi, id_equipe1, id_equipe2,
    score1, score2, tir_but, score3, score4, id_vainqueur) VALUES ('$date_match','$id_tournoi','$id_equipe1','$id_equipe2',
   '$score1','$score2','$tir_but','$score3','$score4','$id_vainqueur');";
   }
   
   
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
} // fin fonction insert_joueur

function delete_match($id) // suppression etudiant  dans la table joueur
{
   // fichier externe car la connexion est utilisée dans différentes pages
   require 'bd.inc.php'; 
   
   // initialisation de la variable à zéro
   $nb_lignes = 0; 
   
   // Requete de suppression MYSQL. 
   $requete = "DELETE FROM matchs WHERE id = $id";
   
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
   else // suppression réussi
   {
       $nb_lignes = mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
   }
   return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1
} // fin fonction delete_etudiant

function update_match($id, $date_match, $id_tournoi, $id_equipe1, $id_equipe2, $score1, $score2, $tir_but, $score3, $score4, $id_vainqueur) // insere un nouveau membre  dans la table membres
{
   // fichier externe car la connexion est utilisée dans différentes pages
   require 'bd.inc.php'; 
   
   $nb_lignes=0; // initialisation de la variable à zéro
   
   // Requete de modification MYSQL. 
   if(!$score3 && !$score4)
   {
    $requete= "UPDATE matchs set date_match='$date_match', id_tournoi='$id_tournoi', id_equipe1='$id_equipe1', id_equipe2='$id_equipe2',
    score1 ='$score1', score2='$score2', tir_but='$tir_but', id_vainqueur='$id_vainqueur' where id=$id";
   }
   else
   {
    $requete= "UPDATE matchs set date_match='$date_match', id_tournoi='$id_tournoi', id_equipe1='$id_equipe1', id_equipe2='$id_equipe2',
    score1 ='$score1', score2='$score2', tir_but='$tir_but', score3='$score3', 
    score4='$score4', id_vainqueur='$id_vainqueur' where id=$id";
   }
   
   // tentative d'execution de la requete INSERT dans la base
   $reponse_serveur=mysqli_query($lien_base, "$requete");
   if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
   {	
       $message_erreur = "Impossible d'executer la requete: $requete ".mysqli_error($lien_base);
       die();
       header("Location:../vue/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
       exit(); // interruption de la fonction après redirection
   }
   else // modification réussi
   {
       $nb_lignes = mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
   }
   return $nb_lignes ; // renvoie le nb de lignes modifiées : normalement 1
} // fin fonction update_etudiant

?>