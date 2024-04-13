<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="./controleur/connexion.php" class="text-center">
                    <h3>Veuillez vous connecter :</h3>
                    <div class="mb-3">
                        <label for="user" class="form-label">Identifiant :</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="mdp" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-2 text-center">
                <fieldset>
                    <small><u>Identifiants de test :</u></small>
                    <br>
                    <small>Identifiant : testSIO</small>
                    <br>
                    <small>Mot de passe : sio123</small>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>
