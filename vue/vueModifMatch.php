<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de match</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modification de match</h1>
        <form action="../controleur/controleurMatch.php" method="POST">
            <?php
                // Récupération de l'identifiant du match
                $id = $_GET["id"];
                
                include '../modele/bd.match.inc.php';
                include '../modele/bd.tournoi.inc.php';
                include '../modele/bd.equipe.inc.php';

                $match = obtenir_par_id_match($id);

                if(empty($match)) {
                    echo "<p class='text-danger'>Aucun match trouvé</p>";
                    die();
                } else {
                    $date_match = $match['date_match'];
                    $id_tournoi = $match['id_tournoi'];
                    $equipe1 = $match['id_equipe1'];
                    $equipe2 = $match['id_equipe2'];
                    $score1 = $match['score1'];
                    $score2 = $match['score2'];
                    $tir_but = $match['tir_but'];
                    $score3 = $match['score3'];
                    $score4 = $match['score4'];
                    $vainqueur = $match['id_vainqueur'];
                    
                    echo "<input type='hidden' name='id' value='$id'>";

                    echo "<div class='mb-3'>";
                    echo "<label for='date_match' class='form-label'>Date du match :</label>";
                    echo "<input type='date' class='form-control' id='date_match' name='date_match' value='$date_match'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='id_tournoi' class='form-label'>Nom du tournoi :</label>";
                    echo "<select class='form-select' id='id_tournoi' name='id_tournoi'>";
                    $les_tournois = obtenir_liste_des_tournoi();
                    foreach($les_tournois as $tournoi) {
                        $id_tournoi = htmlspecialchars($tournoi['id']);
                        $nom_tournoi = htmlspecialchars($tournoi['nom']);
                        $selected = ($id_tournoi == $id_tournoi) ? "selected" : "";
                        echo "<option value='$id_tournoi' $selected>$nom_tournoi</option>";
                    }
                    echo "</select>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='id_equipe1' class='form-label'>Equipe 1 :</label>";
                    echo "<select class='form-select' id='id_equipe1' name='id_equipe1'>";
                    $les_equipes1 = obtenir_liste_des_equipes();
                    foreach($les_equipes1 as $equipe) {
                        $id_equipe = htmlspecialchars($equipe['id']);
                        $nom_equipe = htmlspecialchars($equipe['nom']);
                        $selected = ($id_equipe == $equipe1) ? "selected" : "";
                        echo "<option value='$id_equipe' $selected>$nom_equipe</option>";
                    }
                    echo "</select>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='id_equipe2' class='form-label'>Equipe 2 :</label>";
                    echo "<select class='form-select' id='id_equipe2' name='id_equipe2'>";
                    $les_equipes2 = obtenir_liste_des_equipes();
                    foreach($les_equipes2 as $equipe) {
                        $id_equipe = htmlspecialchars($equipe['id']);
                        $nom_equipe = htmlspecialchars($equipe['nom']);
                        $selected = ($id_equipe == $equipe2) ? "selected" : "";
                        echo "<option value='$id_equipe' $selected>$nom_equipe</option>";
                    }
                    echo "</select>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='score1' class='form-label'>Score Equipe 1 :</label>";
                    echo "<input type='text' class='form-control' id='score1' name='score1' value='$score1'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='score2' class='form-label'>Score Equipe 2 :</label>";
                    echo "<input type='text' class='form-control' id='score2' name='score2' value='$score2'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label class='form-label'>Tir au but :</label>";
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='tir_but' id='oui' value='oui' ". ($tir_but == 'oui' ? 'checked' : '') .">";
                    echo "<label class='form-check-label' for='oui'>Oui</label>";
                    echo "</div>";
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='tir_but' id='non' value='non' ". ($tir_but == 'non' ? 'checked' : '') .">";
                    echo "<label class='form-check-label' for='non'>Non</label>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='score3' class='form-label'>Score Additionnel Equipe 1 :</label>";
                    echo "<input type='text' class='form-control' id='score3' name='score3' value='$score3'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='score4' class='form-label'>Score Additionnel Equipe 2 :</label>";
                    echo "<input type='text' class='form-control' id='score4' name='score4' value='$score4'>";
                    echo "</div>";

                    echo "<div class='mb-3'>";
                    echo "<label for='id_vainqueur' class='form-label'>Vainqueur :</label>";
                    echo "<select class='form-select' id='id_vainqueur' name='id_vainqueur'>";
                    $les_equipes3 = obtenir_liste_des_equipes();
                    foreach($les_equipes3 as $equipe) {
                        $id_equipe = htmlspecialchars($equipe['id']);
                        $nom_equipe = htmlspecialchars($equipe['nom']);
                        $selected = ($id_equipe == $vainqueur) ? "selected" : "";
                        echo "<option value='$id_equipe' $selected>$nom_equipe</option>";
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