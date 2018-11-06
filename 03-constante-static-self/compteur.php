<?php
class Compteur
{
    public static $nbInstanceClass = 0; // appartient à la class
    public $nbInstanceObjet = 0; // appartient à l'objet

    public function __construct(){
        ++self::$nbInstanceClass; // => self::$nbInstanceClass + 1
        ++$this->nbInstanceObjet; // => $this->nbInstanceClass + 1
    }
}
//-------------------------------------
$compteur1 = new Compteur; // nbInstanceClass à 1 - nbInstanceObjet à 1
$compteur2 = new Compteur; // nbInstanceClass à 2- nbInstanceObjet à 1
$compteur3 = new Compteur; // nbInstanceClass à 3 - nbInstanceObjet à 1
$compteur4 = new Compteur; // nbInstanceClass à 4 - nbInstanceObjet à 1
$compteur5 = new Compteur; // nbInstanceClass à 5 - nbInstanceObjet à 1

echo 'Nombre de fois que la classe a instancié : ' . Compteur::$nbInstanceClass . '<hr>'; // Je peux accéder à une propriété de ma classe via ma classe // affiche 5
echo 'Nombre de fois que l\'objet a été instancié : ' . $compteur5->nbInstanceObjet . '<hr>'; // Je peux accéder à une propriété de mon objet via mon objet

/* 
    La class a 'produit' 5 objets
    chaque objet a été 'produit' 1 fois

    Exemple : 
        Une femme à 5 enfants, donc elle est maman 5 fois ! Chacun de ses enfants est né UNE SEULE FOIS.
        Ici, la class serait la mère qui a eu 5 enfant et chaque objet serait les enfant
*/