<?php
// Aleksandar  04/04/2023
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-primary">Nos classements</h1>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom Tournoi</th>
                    <th>Date de création</th>
                    <th>Place 1</th>
                    <th>Place 2</th>
                    <th>Place 3</th>
                    <th>Place 4</th>
                    <th>Place 5</th>  
                </tr>  
            </thead>
            <tbody>
                <?php
                    include '../modele/bd.classement.inc.php';
                    $classements = obtenir_classement();
                    foreach($classements as $classement) {
                        $id = $classement['id_classement'];
                        $nomTournoi = $classement['nom_tournoi'];
                        $dateCreation = $classement['date_creation'];	
                        $place1 = $classement['equipe1'];
                        $place2 = $classement['equipe2'];
                        $place3 = $classement['equipe3'];
                        $place4 = $classement['equipe4'];
                        $place5 = $classement['equipe5'];
                        echo "<tr>";
                        echo "<td>$id</td><td>$nomTournoi</td><td>$dateCreation</td><td>$place1</td><td>$place2</td><td>$place3</td><td>$place4</td><td>$place5</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <ul class="list-unstyled">
            <li><a href="../listemenus.php">Retour accueil</a></li>
        </ul>
    </div>
</body>
</html>
