<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des joueurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-primary">Nos joueurs</h1>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Status</th>
                    <th>Licence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../modele/bd.joueur.inc.php';
                $les_joueurs = obtenir_liste_des_joueurs();
                $nb = count($les_joueurs);
                if($nb > 0) {
                    $i = 0;
                    while ($i < $nb) {
                        $un_joueur = $les_joueurs[$i];
                        $id = $un_joueur['id'];
                        $nom = $un_joueur['nom'];
                        $prenom = $un_joueur['prenom'];
                        $status = $un_joueur['status_licence'];
                        $date_naiss = $un_joueur['date_naissance'];
                        $licence = $un_joueur['numero'];
                        echo "<tr>";
                        echo "<td>$id</td><td>$nom</td><td>$prenom</td><td>$date_naiss</td><td>$status</td><td>$licence</td>";
                        echo "<td><a href='vueModifJoueur.php?id=$id' class='btn btn-primary'>Modifier</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="../controleur/controleurJoueur.php" method="POST">
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
