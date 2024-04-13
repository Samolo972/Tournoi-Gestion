<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tournois</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="color: blue;">Nos tournois</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du tournoi</th>
                    <th>Ville</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Inclusion du modèle pour obtenir la liste des tournois
                    include '../modele/bd.tournoi.inc.php';
                    
                    // Récupération de la liste des tournois
                    $les_tournois = obtenir_liste_des_tournoi();
                    
                    // Vérification s'il y a des tournois à afficher
                    if(!empty($les_tournois)) {
                        foreach ($les_tournois as $tournoi) {
                            $id = $tournoi['id'];
                            $nom = $tournoi['nom'];
                            $ville = $tournoi['ville'];
                            $date_tournoi = $tournoi['date_tournoi'];
                            echo "<tr>";
                            echo "<td>$id</td><td>$nom</td><td>$ville</td><td>$date_tournoi</td>";
                            echo "<td><a href='vueModifTournoi.php?id=$id' class='btn btn-primary'>Modifier</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Aucun tournoi trouvé</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <form action="../controleur/controleurTournoi.php" method="POST">
            <div class="d-flex justify-content-end">
                <input type="submit" name="ajouter" value="Ajouter" class="btn btn-success">
            </div>
            <ul class="list-unstyled mt-3">
                <li><a href="../listemenus.php" class="btn btn-secondary">Retour à l'accueil</a></li>
            </ul>
        </form>
    </div>
</body>
</html>
