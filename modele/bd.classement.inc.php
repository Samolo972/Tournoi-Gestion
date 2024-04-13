<?php
// fonction qui renvoie un tableau de tous les joueurs
function obtenir_classement() 
{
   // pour connexion au SGBD
   require 'bd.inc.php'; 
   
   $classement = array(); // création du tableau

   $requete="select c.id as id_classement, t.nom as nom_tournoi, 
   t.date_tournoi as date_creation ,
   (select nom from equipe e where e.id = c.place1) as equipe1, 
   (select nom from equipe e where e.id = c.place2) as equipe2, 
   (select nom from equipe e where e.id = c.place3) as equipe3,
   (select nom from equipe e where e.id = c.place4) as equipe4,
   (select nom from equipe e where e.id = c.place5) as equipe5
   from classement c join tournoi t on c.id_tournoi = t.id";
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
           $classement[] = mysqli_fetch_array($resultat_sql); 
           $i=$i+1; // incrémentation
       }
   }
   return $classement;// le tableau sera vide en cas d'erreur
}// fin fonction()


?>