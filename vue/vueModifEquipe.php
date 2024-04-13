<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'équipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modification d'équipe</h1>
        <form action="../controleur/controleurEquipe.php" method="POST">
            <?php
                // Récupération du numéro courant
                $id = $_GET["id"];
                include "../modele/bd.equipe.inc.php";
                $equipe = obtenir_par_id_equipe($id);

                if(empty($equipe)) {
                    echo "<p class='text-danger'>Aucune équipe trouvée</p>";
                    die();
                } else {
                    $id = $equipe['id'];
                    $nomEquipe = $equipe['nom'];
                    $anneeCreation = $equipe['anneeCreation'];
                    
                    echo "<input type='hidden' name='id' value='$id'>";
                    
                    echo "<div class='mb-3'>";
                    echo "<label for='nomEquipe' class='form-label'>Nom de l'équipe :</label>";
                    echo "<input type='text' class='form-control' id='nomEquipe' name='nomEquipe' value='$nomEquipe'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='anneeCreation' class='form-label'>Année de création :</label>";
                    echo "<input type='text' class='form-control' id='anneeCreation' name='anneeCreation' value='$anneeCreation'>";
                    echo "</div>";
                }
            ?>
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-primary me-2" value="Modifier" name="modifier">
                <input type="submit" class="btn btn-danger" value="Supprimer" name="supprimer">
            </div>
            <ul class="list-unstyled mt-3">
                <li><a href="../listemenus.php" class="btn btn-secondary">Retour à l'accueil</a></li>
            </ul>
        </form>
    </div>
</body>
</html>
