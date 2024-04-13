<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des licences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-primary">Nos licences</h1>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Numéro</th>
                    <th>Catégorie</th>
                    <th>Année de licence</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../modele/bd.licence.inc.php';
                $les_licences = obtenir_liste_des_licences();
                $nb = count($les_licences);
                if($nb > 0) {
                    $i = 0;
                    while ($i < $nb) {
                        $une_licence = $les_licences[$i];
                        $id = $une_licence['id'];
                        $numero = $une_licence['numero'];
                        $categorie = $une_licence['categorie'];
                        $annee_licence = $une_licence['annee_licence'];
                        $status_licence = $une_licence['status_licence'];
                        echo "<tr>";
                        echo "<td>$id</td><td>$numero</td><td>$categorie</td><td>$annee_licence</td><td>$status_licence</td>";
                        echo "<td><a href='vueModifLicence.php?id=$id' class='btn btn-primary'>Modifier</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="../controleur/controleurLicence.php" method="POST">
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
