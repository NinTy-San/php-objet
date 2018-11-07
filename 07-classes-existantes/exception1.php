<?php
// Exception : Version procéédural et traitement Orienté Objet.
// l'avantage des exception c'est de centralisé un traitement à effectuer dans le catch en cas d'erreur.

function recherche($tab, $element){

    if (!is_array($tab) ){
        Throw new Exception('vous devez envoyer un array !');
        // Throw  : permet de nous envoyer dans le bloc catch et arréter l'execution du code.
    }

    if(sizeof($tab) <= 0){

        Throw new Exception('vous devez envoyer un array avec du contenu.');
    }
    $position = array_search($element, $tab);
    return $position;
}
//---------------------------------------------------
$tab = array();
$liste = array('orange', 'fraise', 'pomme');

try{ // bloc d'essai (On essaie d'effectuer les instruction suivante dans le try)

    echo recherche($liste, 'pomme') . '<br>';
    // echo recherche($tab, 'pomme') . '<br>';
    echo recherche('tableau', 'pomme') . '<br>';
    echo 'Traitement...';
}
catch(Exception $e){ // bloc de capture. On va attraper les 'Exception' s'il y en a une qui est relevée? $e représente l'Excepetion car en renseignant le Throw, je n'ai pas pu mettre le nom d'une variable puisque l'exception est stopper pour arriver dans le catch

    echo "<strong>Message d'erreur</strong> : " . $e->getMessage() . '<br>';
    echo "Traitement conforme dans le cas où l'argument n'est pas un Array, Ou que l'argument est un array vide. <br>";
    echo 'Information ' . $e->getCode() . '<br>message : ' . $e->getMessage()  . '<br>Fichier : ' . $e->getFile() . '<br>Ligne : ' . $e->getLine() . '<br>';
}
// ----------------------------------------------------------------------------------------------------
/* 
EXCEPTION : est une classe prédéfine
Une Exception est une erreur que l'in peut attraper grâce à try/catch
Throw : permet de l'exécution du 'try' et de rentrer le 'catch'
try et catch permet d'avoir 2 blocs d'instructions distinctes
*/
//---------------------------------------------
echo '<hr><hr>';
try{
    $bdd= new PDO('mysql:host=localhost;dbname=test1', 'root', ''); // tentative de connexion

    echo  'connexion réussie !!'; // Si la connexion est réussie, alors cette instruction sera exécutée.
}
catch(PDOException $e){ // On attrape les exeption PDOException
    echo 'La connexion a la BDD à Echoué !! ';
}

echo '<pre>';
    print_r(get_class_methods($e));
echo '</pre>';