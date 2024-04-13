<?php
// Aleksandar  04/04/2023
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout match</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../controleur/controleurMatch.php" method="POST">
            <input type='hidden' name='mode' value='1'>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2" class="text-center">Veuillez saisir les informations du match</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Date du match :</td>
                        <td><input type="date" class="form-control" name="date_match"></td>
                    </tr>
                    <tr>
                        <td>Nom tournoi :</td>
                        <td>
                            <select class="form-select" name='id_tournoi'>
                                <option value=''>--Choisissez un tournoi--</option>
                                <?php
                                    include '../modele/bd.tournoi.inc.php';
                                    $les_tournois = obtenir_liste_des_tournoi();
                                    foreach($les_tournois as $tournoi) {
                                        $id_tournoi = htmlspecialchars($tournoi['id']);
                                        $nom_tournoi = htmlspecialchars($tournoi['nom']);
                                        echo "<option value='$id_tournoi'>$nom_tournoi</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Equipe 1 :</td>
                        <td>
                            <select class="form-select" name='id_equipe1'>
                                <option value=''>--Choisissez une équipe--</option>
                                <?php
                                    include '../modele/bd.equipe.inc.php';
                                    $les_equipes = obtenir_liste_des_equipes();
                                    foreach($les_equipes as $equipe) {
                                        $id_equipe = htmlspecialchars($equipe['id']);
                                        $nom_equipe = htmlspecialchars($equipe['nom']);
                                        echo "<option value='$id_equipe'>$nom_equipe</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Equipe 2 :</td>
                        <td>
                            <select class="form-select" name='id_equipe2'>
                                <option value=''>--Choisissez une équipe--</option>
                                <?php
                                    $les_equipes2 = obtenir_liste_des_equipes();
                                    foreach($les_equipes2 as $equipe2) {
                                        $id_equipe2 = htmlspecialchars($equipe2['id']);
                                        $nom_equipe2 = htmlspecialchars($equipe2['nom']);
                                        echo "<option value='$id_equipe2'>$nom_equipe2</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Score Equipe 1 :</td>
                        <td><input type="text" class="form-control" name="score1"></td>
                    </tr>
                    <tr>
                        <td>Score Equipe 2 :</td>
                        <td><input type="text" class="form-control" name="score2"></td>
                    </tr>
                    <tr>
                        <td>Tir au but :</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tir_but" value="oui">
                                <label class="form-check-label" for="oui">Oui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tir_but" value="non">
                                <label class="form-check-label" for="non">Non</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Score Additionnel Equipe 1 :</td>
                        <td><input type="text" class="form-control" name="score3"></td>
                    </tr>
                    <tr>
                        <td>Score Additionnel Equipe 2 :</td>
                        <td><input type="text" class="form-control" name="score4"></td>
                    </tr>
                    <tr>
                        <td>Vainqueur :</td>
                        <td>
                            <select class="form-select" name='id_vainqueur'>
                                <option value=''>--Choisissez une équipe--</option>
                                <?php
                                    $les_equipes3 = obtenir_liste_des_equipes();
                                    foreach($les_equipes3 as $equipe3) {
                                        $id_equipe3 = htmlspecialchars($equipe3['id']);
                                        $nom_equipe3 = htmlspecialchars($equipe3['nom']);
                                        echo "<option value='$id_equipe3'>$nom_equipe3</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" class="btn btn-primary" value="Ajouter">
                            <input type="reset" class="btn btn-secondary" value="Effacer">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="vueMatchs.php" class="btn btn-info">Liste des matchs</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
