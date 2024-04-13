<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de licence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modification de licence</h1>
        <form action="../controleur/controleurLicence.php" method="POST">
            <?php
                // Récupération de l'identifiant de la licence
                $id = $_GET["id"];
                
                include '../modele/bd.licence.inc.php';
                
                $licence = obtenir_par_id_licence($id);

                if(empty($licence)) {
                    echo "<p class='text-danger'>Aucune licence trouvée</p>";
                    die();
                } else {
                    $numero = $licence['numero'];
                    $categorie = $licence['categorie'];
                    $annee_licence = $licence['annee_licence'];
                    $status_licence = $licence['status_licence'];
                    
                    echo "<input type='hidden' name='id' value='$id'>";
                    
                    echo "<div class='mb-3'>";
                    echo "<label for='numero' class='form-label'>Numéro :</label>";
                    echo "<input type='text' class='form-control' id='numero' name='numero' value='$numero'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='categorie' class='form-label'>Catégorie :</label>";
                    echo "<input type='text' class='form-control' id='categorie' name='categorie' value='$categorie'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='annee_licence' class='form-label'>Année de licence :</label>";
                    echo "<input type='text' class='form-control' id='annee_licence' name='annee_licence' value='$annee_licence'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label class='form-label'>Statut de la licence :</label>";
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='status_licence' id='valide' value='valide' ". ($status_licence == 'valide' ? 'checked' : '') .">";
                    echo "<label class='form-check-label' for='valide'>Valide</label>";
                    echo "</div>";
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='status_licence' id='expire' value='expire' ". ($status_licence == 'expire' ? 'checked' : '') .">";
                    echo "<label class='form-check-label' for='expire'>Expiré</label>";
                    echo "</div>";
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
