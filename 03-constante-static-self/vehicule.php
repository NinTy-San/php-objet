<?php
class Vehicule
{
    private static $marque = 'BMW'; // appartient à la classe
    private $couleur = 'Noir'; // appartient à l'objet

    public function setMarque($m){ 
        self::$marque = $m; // propriété static (self::)
    }
    public function getMarque(){
        return self::$marque; // propriété static (self::)
    }
    public function setCouleur($c){
        $this->couleur = $c; // propriété ($this->)
    }
    public function  getCouleur(){
        return $this->couleur; // propriété ($this->)
    }
}

$vehicule1 = new Vehicule;
echo '<strong>Véhicule1 de marque</strong> : ' . $vehicule1->getMarque() . ' et couleur ' . $vehicule1->getCouleur(). '<hr>';

$vehicule2 = new Vehicule;
echo '<strong>Véhicule2 de marque</strong> : ' . $vehicule2->getMarque() . ' et couleur ' . $vehicule2->getCouleur(). '<hr>';

$vehicule3 = new Vehicule;
$vehicule3->setCouleur('Rouge'); // modification sur l'objet en cours
echo '<strong>Véhicule3 de marque</strong> : ' . $vehicule3->getMarque() . ' et couleur ' . $vehicule3->getCouleur(). '<hr>'; // BMW - Rouge

$vehicule4 = new Vehicule;
echo '<strong>Véhicule4 de marque</strong> : ' . $vehicule4->getMarque() . ' et couleur ' . $vehicule4->getCouleur(). '<hr>';

$vehicule5 = new Vehicule;
$vehicule5->setMarque('Mercedes'); // modification de la class (car la propriété $marque est static ) et donc modification de tous les futurs objet émanant de la classe
echo '<strong>Véhicule5 de marque</strong> : ' . $vehicule5->getMarque() . ' et couleur ' . $vehicule5->getCouleur(). '<hr>';

$vehicule6 = new Vehicule;
echo '<strong>Véhicule6 de marque</strong> : ' . $vehicule6->getMarque() . ' et couleur ' . $vehicule6->getCouleur(). '<hr>';
