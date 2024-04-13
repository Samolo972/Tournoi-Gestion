<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des équipes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-primary">Nos équipes</h1>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom de l'équipe</th>
                    <th>Année de Création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Inclusion du modèle du design paterb MVC
                include '../modele/bd.equipe.inc.php';
                // création du tableau des étudiants à ce stade)
                $les_equipes = obtenir_liste_des_equipes();
                // nombre de lignes à afficher
                $nb = count($les_equipes);
                if($nb > 0) {
                    // attention dans un tableau la numérotation commence à zéro
                    $i = 0;
                    while ($i < $nb) {
                        $un_equipe = $les_equipes[$i];
                        $id = $un_equipe['id'];
                        $nom = $un_equipe['nom'];
                        $AnneeCreation = $un_equipe['anneeCreation'];
                        echo "<tr>";
                        echo "<td>$id</td><td>$nom</td><td>$AnneeCreation</td>";
                        echo "<td><a href='vueModifEquipe.php?id=$id' class='btn btn-primary'>Modifier</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="../controleur/controleurEquipe.php" method="POST">
            <div class="d-flex justify-content-end">
                <input type="submit" name="ajouter" value="Ajouter" class="btn btn-success">
            </div>
        </form>
        <ul class="list-unstyled">
            <li><a href="../listemenus.php" class="btn btn-secondary">Retour accueil</a></li>
        </ul>
    </div>
</body>
</html>
