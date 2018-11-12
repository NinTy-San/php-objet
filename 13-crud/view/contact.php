<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $contact->prenom; ?></title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    <h1><?php echo $contact->prenom; ?></h1>
    <div>
      <span>Prenom : </span>
      <?php echo $contact->prenom; ?>
    </div>
    <div>
      <span>Nom : </span>
      <?php echo $contact->nom; ?>
    </div>
    <div>
      <span>Sexe : </span>
      <?php echo $contact->sexe; ?>
    </div>
    <div>
      <span>Service : </span>
      <?php echo $contact->service; ?>
    </div>
    <div>
      <span>Date d'embauche : </span>
      <?php echo $contact->date_embauche; ?>
    </div>
    <div>
      <span>Salaire : </span>
      <?php echo $contact->salaire; ?>
    </div>
    
</body>
</html>