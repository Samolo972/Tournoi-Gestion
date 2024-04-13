<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des matchs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-primary">Nos matchs</h1>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Date Match</th>
                    <th>Nom Tournoi</th>
                    <th>Nom Equipe 1</th>
                    <th>Nom Equipe 2</th>
                    <th>Score Equipe 1</th>
                    <th>Score Equipe 2</th>
                    <th>Tir au but</th>
                    <th>Score Additionnel Equipe 1</th>
                    <th>Score Additionnel Equipe 2</th>
                    <th>Nom Vainqueur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../modele/bd.match.inc.php';
                $les_matchs = obtenir_liste_des_matchs();
                $nb = count($les_matchs);
                if($nb > 0) {
                    $i = 0;
                    while ($i < $nb) {
                        $un_match = $les_matchs[$i];
                        $id = $un_match['id_match'];
                        $date_match = $un_match['date_match'];
                        $nomTournoi = $un_match['nom_tournoi'];
                        $equipe1 = $un_match['equipe1'];
                        $equipe2 = $un_match['equipe2'];
                        $score1 = $un_match['score1'];
                        $score2 = $un_match['score2'];
                        $tir_but = $un_match['tir_but'];
                        $score3 = $un_match['score3'];
                        $score4 = $un_match['score4'];
                        $nomVainqueur = $un_match['vainqueur'];
                        echo "<tr>";
                        echo "<td>$id</td><td>$date_match</td><td>$nomTournoi</td><td>$equipe1</td><td>$equipe2</td><td>$score1</td><td>$score2</td><td>$tir_but</td><td>$score3</td><td>$score4</td><td>$nomVainqueur</td>";
                        echo "<td><a href='vueModifMatch.php?id=$id' class='btn btn-primary'>Modifier</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="../controleur/controleurMatch.php" method="POST">
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
