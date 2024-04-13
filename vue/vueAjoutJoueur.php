<?php
// Aleksandar  04/04/2023
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout joueur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../controleur/controleurJoueur.php" method="POST">
            <input type='hidden' name='mode' value='1'>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2" class="text-center">Veuillez saisir les informations du joueur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom :</td>
                        <td><input type="text" class="form-control" name="nom"></td>
                    </tr>
                    <tr>
                        <td>Prénom :</td>
                        <td><input type="text" class="form-control" name="prenom"></td>
                    </tr>
                    <tr>
                        <td>Date de naissance :</td>
                        <td><input type="date" class="form-control" name="date_naiss"></td>
                    </tr>
                    <tr>
                        <td>Licence :</td>
                        <td>
                            <select class="form-select" name="licence">
                                <option value="">--Choisissez une licence--</option>
                                <?php
                                    include '../modele/bd.licence.inc.php';
                                    $les_licences = obtenir_liste_des_licences();
                                    foreach($les_licences as $licence) {
                                        $id_licence = htmlspecialchars($licence['id']);
                                        $numero = htmlspecialchars($licence['numero']);
                                        echo "<option value='$id_licence'>$numero</option>";
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
                            <a href="vueJoueur.php" class="btn btn-info">Liste des joueurs</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
