<?php
// Aleksandar  04/04/2023
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout licence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../controleur/controleurLicence.php" method="POST">
            <input type='hidden' name='mode' value='1'>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2" class="text-center">Veuillez saisir les informations de la licence</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Numéro :</td>
                        <td><input type="text" class="form-control" name="numero"></td>
                    </tr>
                    <tr>
                        <td>Catégorie :</td>
                        <td><input type="text" class="form-control" name="categorie"></td>
                    </tr>
                    <tr>
                        <td>Année Licence :</td>
                        <td><input type="text" class="form-control" name="annee_licence"></td>
                    </tr>
                    <tr>
                        <td>Valide :</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_licence" id="valide" value="valide">
                                <label class="form-check-label" for="valide">Valide</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_licence" id="expire" value="expire">
                                <label class="form-check-label" for="expire">Expiré</label>
                            </div>
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
                            <a href="vueLicence.php" class="btn btn-info">Liste des licences</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
