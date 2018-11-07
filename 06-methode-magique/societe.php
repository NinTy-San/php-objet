<?php
// les méthodes magique s'execute automatiquement.
class Societe{
    public $adresse; 
    public $ville; 
    public $cp; 
    public function __construc(){}
        public function __set($nom, $valeur){// Se déclanche en cas de tentative d'affectation sur une propriété innexistante.

            echo "la propriété $nom n'existe pas, la valeur $valeur n'a donc pas été affectée ! <br>";
        }
        public function __get($nom){ // Se déclanche uniquement en cas de tentative d'affectation sur une propriété innexistante.

            echo "la propriété $nom n'existe pas, on ne peut pas l'afficher ! <br>";
        }
        public function __call($nom, $argument){ // se déclanche uniquement en cas de tentative d'execution sur une méthode qui n'existe pas
            echo "tentative d'execution de la méthode $nom, cette méthode n'existe pas. <br> Le argument étaient : " .implode(' - ', $argument) . '<br>';
        }
}

//--------------------------------------------------------------------------------------------------------------------------
$societe1 = new Societe;
// $societe1->villes = 'Paris'; // test - lorsque l'on tente d'affecter une valeur à une propriete inexistante, ça fonctionne ett ajoute donc la propriété  et sa valeur à l'objet.
// echo $societe1->titre;  // erreur undefine, la propriété n'existe pas !
// $societe1->methode(); // erreur fatal, la methode n'existe pas ! 
//--------------------------------------------
$societe1->pays = 'France'; // déclanchement de la méthode __set() au lieu de la création d'une nouvelle propriété
$societe1->ville = 'Paris';

echo $societe1->titre; // declanche la methode __get() au lieu d'une erreur undefine.
echo $societe1->methode(1,2,3); // declanche la methode __call() au lieu d'une erreur fatal.

echo '<pre>';
    print_r($societe1);
echo '</pre>';
//----------------------------------------------------------------------------------------------------
/* 
    Il exiiste plusieurs autres méthodes magiques.
    __callStatic($nom, $argument) => pour les méthodes 'static
    __isset($nom) => Se lance lors d'une condition isset/empty sur une propriét
    __destruct() => se lance à la fin de l'execution du script. (pratique pour fermer la connexion à la BDD par exemempe)
    etc... => voir la doc
    */
