<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de joueur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modification de joueur</h1>
        <form action="../controleur/controleurJoueur.php" method="POST">
            <?php
                // Récupération de l'identifiant du joueur
                $id = $_GET["id"];
                
                include '../modele/bd.joueur.inc.php';
                include '../modele/bd.licence.inc.php';
                
                $joueur = obtenir_par_id_joueur($id);

                if(empty($joueur)) {
                    echo "<p class='text-danger'>Aucun joueur trouvé</p>";
                    die();
                } else {
                    $nom = $joueur['nom'];
                    $prenom = $joueur['prenom'];
                    $date_naiss = $joueur['date_naissance'];
                    $licence_id = $joueur['id_licence'];

                    $les_licences = obtenir_liste_des_licences();
                    
                    echo "<input type='hidden' name='id' value='$id'>";

                    echo "<div class='mb-3'>";
                    echo "<label for='nom' class='form-label'>Nom :</label>";
                    echo "<input type='text' class='form-control' id='nom' name='nom' value='$nom'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='prenom' class='form-label'>Prénom :</label>";
                    echo "<input type='text' class='form-control' id='prenom' name='prenom' value='$prenom'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='date_naiss' class='form-label'>Date de naissance :</label>";
                    echo "<input type='date' class='form-control' id='date_naiss' name='date_naiss' value='$date_naiss'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='licence' class='form-label'>Licence :</label>";
                    echo "<select class='form-select' id='licence' name='licence'>";

                    foreach($les_licences as $licence) {
                        $id_licence = htmlspecialchars($licence['id']);
                        $numero = htmlspecialchars($licence['numero']);
                        if($id_licence == $licence_id) {
                            echo "<option value='$id_licence' selected>$numero</option>";
                        } else {
                            echo "<option value='$id_licence'>$numero</option>";
                        }
                    }
                    echo "</select>";
                    echo "</div>";
                }
            ?>
            <div class="d-flex justify-content-between">
                <input type="submit" class="btn btn-primary" value="Modifier" name="modifier">
                <input type="submit" class="btn btn-danger" value="Supprimer" name="supprimer">
            </div>
            <ul class="list-unstyled mt-3">
                <li><a href="../listemenus.php" class="btn btn-secondary">Retour à l'accueil</a></li>
            </ul>
        </form>
    </div>
</body>
</html>
