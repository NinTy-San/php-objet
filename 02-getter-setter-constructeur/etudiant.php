<?php
class Etudiant
{
    private $prenom;

    public function __construct($arg){
        //__construct : méthode appelée automatiquement lors d'une instaciation de la classe ('new') One ne peut pas déclarer 2 constructeurs en PHP.

        echo "Instanciation nous avons reçu l'information suivant : $arg";
        $this->setPrenom($arg); // Il est préférable de passer par le setter, comme ça on passe dans les controles.
    }
    public function setPrenom($arg){
        $this->prenom = $arg;
    }
    public function getPrenom($arg){
        return $this->prenom;
    }
}

// ---------------------------------------------------------------------
$etudiant1 = new Etudiant('Arnaud'); // __construct est appelée automatiquement, nous avons mis un argument après le nom de la classe qui attérit dans le constructeur.

echo '<br> Prenom : ' . $etudiant1->getPrenom();

// $etudiant1->__construct(); // Le constructeur peut tout de même etre appelé comme méthode 'classique'

//---------Plus:
// __construct :  sera équivalent du init avec session_start, connexion à la bdd, autoload, etc...
// __construc : méthode magique qui s'execute automatiquement