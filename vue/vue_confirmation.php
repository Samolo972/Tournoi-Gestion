<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- ci-dessous traitement du retour d'information après insertion -->
        <?php
        // récupération du nombre de lignes traitées - dans le cas où on est après une insertion
        $n = $_GET["nb"]; // récupère la valeur transmise dans $url
        echo "<div class='alert alert-success' role='alert'>
                Confirmation<br/>
                Les valeurs ont bien été enregistrées<br/>
                $n lignes insérées
            </div>";
        ?>
        <!-- Lien pour retourner à la page initiale -->
        <a href="../listemenus.php" class="btn btn-primary">Retour accueil</a>
    </div>
</body>
</html>
