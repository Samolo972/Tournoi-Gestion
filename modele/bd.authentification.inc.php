<?php

function liste_utilisateurs()
{
    require 'bd.inc.php';

    $utilisateurs = array(); // création du tableau

   $requete="select * from identifiants";
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
           $utilisateurs[] = mysqli_fetch_array($resultat_sql); 
           $i=$i+1; // incrémentation
       }
   }
   return $utilisateurs;// le tableau sera vide en cas d'erreur
}

?>