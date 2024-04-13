<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une équipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../controleur/controleurEquipe.php" method="POST">
            <input type='hidden' name='mode' value='1'>
            <table class="table table-bordered">
                <tr>
                    <td colspan="2" class="text-center"><h3>Veuillez saisir les informations de l'équipe à créer</h3></td>
                </tr>
                <tr>
                    <td>Nom de l'équipe :</td>
                    <td><input type="text" class="form-control" name="teamname"></td>
                </tr>
                <tr>
                    <td>Année de création :</td>
                    <td><input type="text" class="form-control" name="anneeCreation"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" class="btn btn-primary" value="Envoyer">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <a href="vueEquipe.php" class="btn btn-secondary">Liste des équipes</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
