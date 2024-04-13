<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>
    <head>
        <title>Affichage d'erreur</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $erreur=$_GET["erreur"];
            echo "<p class='erreur'>$erreur</p>";
        ?>
        <!-- Lien pour retourner à la page initiale -->
        <a href="../listemenus.php">Retour accueil</a>
    </body>
</html>