<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlentities($title); ?></title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    <form action="" method="post">
        
        <label for="prenom">Prénom :</label><br>
        <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>"><br><br>

        <label for="nom">Nom :</label><br>
        <input type="text" name="nom" id="nom" value="<?= $nom ?>"><br><br>

        <label for="sexe">Sexe :</label><br>
        <input type="text" name="sexe" id="sexe" value="<?= $sexe ?>"><br><br>

        <label for="service">Service :</label><br>
        <input type="text" name="service" id="service" value="<?= $service ?>"><br><br>

        <label for="date_embauche">Date d'embauche :</label><br>
        <input type="text" name="date_embauche" id="date_embauche" value="<?= $date_embauche ?>"><br><br>

        <label for="salaire">Salaire :</label><br>
        <input type="text" name="salaire" id="salaire" value="<?= $salaire ?>"><br><br>

        <input type="submit" value="Valider">
    </form>
</body>
</html>