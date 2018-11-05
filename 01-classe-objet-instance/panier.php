<?php
// Une classe permet de produire plusieurs objet. Par convention, une classe sera nommée avec la première lettre en MAJUSCULE.
class Panier {
    public $nbProduit; // propiété
    public function ajouterArticle(){ // methode
        // traitements
        return "L'article a bien été ajouté";
    }
    protected function retirerArticle(){
        // traitements
        return "L'article a bien été retiré";
    }
    private function affichageArticle(){
        //traitements
        return "Voici les articles !";
    }
}
// -------------------------------------------------------------
$panier1 = new Panier; // new Panier <=> Instanciation (permet de déployer l'objet issue de la classe (ici, Panier) permet de passer d'une classe à l'objet).
// $panier1 représente l'objet issue de la classe
var_dump($panier1);
// type(objet), nom de la classe référence de l'objet
$panier1->nbProduit = 5;
echo '<br> Panier 1 : ' .$panier1->nbProduit . ' produits <br>'; // Appel de la propriété public

echo 'Panier 1 : ' .$panier1->ajouterArticle() . '<br>'; // Appel de la propriété public

// echo 'Panier 1 : ' .$panier1->retirerArticle() . '<br>'; // Appel de la propriété public 
// Error, l'élément est accessible uniquement dans la classe où cela a été déclaré ainsi que dans les classes héritières.

// echo 'Panier 1 : ' .$panier1->affichageArticle() . '<br>'; // Appel de la propriété public
// Error, l'élément est accessible uniquement dans la classe où cela a été déclaré.

$panier2 = new Panier;
var_dump($panier2);
$panier2->nbProduit = 10;
echo '<br>Panier2 : '. $panier2->nbProduit . ' produits <br>';
echo '<br>Panier1 : '. $panier1->nbProduit . ' produits <br>';

//---------------------------------------------------------------
/* Niveau de visibilité : 

    public : accessible de partout
    protected : accessible  uniquement dans la classe ou cela a été déclaré ET aussi dans les classes héritères
    private : accessible  uniquement dans la classe ou cela a été déclaré

    new :   mot-clé permettant d'effectuer un instanciation (et donc créer un objet) une classe permet de produire plusieurs objets donc nous pouvons             effectuer plusieurs instanciation 'new'
    Ici, $panier1 (et $panier2) représente l'objet  issue de la classe Panier
    
Plus : Quand on instancie une classe, la variable stockant l'objet ne stock en fait pas l'objet lui-m^me, mais identifiant qui représente cet objet (espace mémoire en ram sur le serveur).