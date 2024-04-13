<html>
    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <title>Modif Tournoi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body align="center">
        <form action="../controleur/controleurTournoi.php" method="POST">
                <?php
                    //Recupération du numero courant
                    $id = $_GET["id"];
                    include '../modele/bd.tournoi.inc.php';
                    
                    $tournoi = array();
                    $tournoi = obtenir_par_id_tournoi($id); // appel de la fonction
                    
                    $nb = count($tournoi); // nombre trouvé
                    
                    if($nb == 0) // aucun pour ce numéro
                    {
                        echo "<p>Aucun tournoi trouvé</p>";
                        die(); // arret
                    }
                    else  // $nb > 0 donc on a trouvé  1
                    {
                            $id = $tournoi['id'];			// extraction des champs de la ligne
                            $nom = $tournoi['nom'];
                            $ville = $tournoi['ville'];
                            $date_tournoi = $tournoi['date_tournoi'];
                            echo "<table>";
                            echo "<tr><td align='left' colspan='2'><b>Les informations du tournoi en modification : </b></td></tr>";
                            echo "<tr><td>ID :</td><td>$id</td></tr>"; // ID non modifiable
                            echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable

                            echo "<tr><td>Nom :</td><td><input type='text' name='nom' size='20' value='$nom'></td></tr>";
                            echo "<tr><td>Ville :</td><td><input type='text' name='ville' size='20' value='$ville'></td></tr>";
                            echo "<tr><td>Date tournoi :</td><td><input type='date' name='date_tournoi' size='20' value='$date_tournoi'></td></tr>";
                            echo "</table>";
                    } 
                ?>
                <table border=0>
                    <tr>
                        <td align="right" colspan="2" >
                            <input type="submit" value="Modifier" name="modifier">
                            <input type="submit" value="Supprimer" name="supprimer">
                        </td>
                    </tr>
                </table>
                <table>
                <tr><ul>
                    <td><li><a href='../listemenus.php'>retour accueil</a></li></td>
                </ul></tr>
                </table>
        </form>
    </body>
</html>