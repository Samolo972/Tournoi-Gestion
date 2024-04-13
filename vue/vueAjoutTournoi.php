<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer de tournoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="text-center">
    <div class="container">
        <form action="../controleur/controleurTournoi.php" method="POST">
            <input type='hidden' name='mode' value='1'>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2">Veuillez saisir les informations du tournoi à organiser</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom :</td>
                        <td><input type="text" class="form-control" name="idTournoinom"></td>
                    </tr>
                    <tr>
                        <td>Ville :</td>
                        <td><input type="text" class="form-control" name="tournoiVille"></td>
                    </tr>
                    <tr>
                        <td>Date tournoi :</td>
                        <td><input type="date" class="form-control" name="dateTournoi"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary" value="Envoyer" name="envoyer">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="vueTournoi.php" class="btn btn-secondary">Liste des tournois</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
