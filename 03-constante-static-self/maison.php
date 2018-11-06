<?php
class maison
{
    public static $espaceTerrain = '500m²'; // appartient à la classe
    public $couleur = 'blanc'; // appartient à l'objet

    const HAUTEUR = '10m'; // appartient à la class

    private static $nbPiece = 7; // appartient à la classe
    private  $nbPorte = 10; // appartient à l'objet

    public static function getNbPiece(){
        return self::$nbPiece; // lors d'un self::, il faut mettre le $ devant la propriété
    }
    public function getnbPorte(){
        return $this->nbPorte;
    }
}
// -----------------------------------------
echo 'Nombre de pièces : ' . Maison::getNbPiece() . '<hr>'; // J'appele une méthode de ma classe par ma classe 
echo 'Espace du terrain : ' . Maison::$espaceTerrain. '<hr>'; // J'appele une propriété de ma classe par ma classe

$maison1 = new Maison;
echo 'Couleur : ' . $maison1->couleur . '<hr>'; // J'appele une propriété de mon objet par mon objet
echo 'Nombre de porte : ' . $maison1->getnbPorte() . '<hr>'; // J'appele une méthode de mon objet par mon objet

// echo 'hauteur : ' Maison:: ################# Compléter

// ---------------------

// echo $maison1->espaceTerrain; // Erreur,on ne peut pas appeler une propriété static par mon objet (->)
// echo Maison::$couleur; // Erreur, on ne peut pas appeler une propriété public avec ma class (::)
// echo Maison::getnbPorte(); // Erreur, on ne peut pas appeler une méthode de mon objet avec ma classe
// echo $maison1->getNbPiece(); // pas d'erreur..., mais ça devrait car la méthode est static et donc il faudrait l'appeler par la classe et non pa l'objet
// echo $maison1::$espaceTerrain; //  devrait donner là aussi une erreur, c'est n'importe quoi !! A banir !

// ------------------------------------------------
/* 
    oppérateur:
    $objet->element d'un objet a l'exterieur de la classe
    $this->element d'un objet a l'intérieur de la classe
    
    class::$element d'une classe a l'exterieur de la classe
    self::$element d'une classe a l'interieur de la classe

    2 question à se poser  :
    Est-ce que c'est static .
        Si OUI => self:: , class::
            est-ce que c'est dans la classe?
                Si OUI, self::
                Si NON, class::
        Si NON => $objet->, $this->
            Est-ce que c'est dans la classe ?
            Si oui, $this->
            Si non, objet->
*/