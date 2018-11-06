<?php
// Surcharge (override) : Une surcharge me permet de prendre en compte ma fonction d'origine et d'y ajouter un traitement.
class A 
{
    public function calcul(){
        // traitements
        return 10;
    }
}
// --------------------------------------------
class B extends A{
    public function calcul() // redéfinition 
    {
        $n = parent::calcul();
        // On n'utilisera pas $this->calcul() sinon, la fonction sera récursive  et la méthode s'appelera en boucle.
        // 'parent' fonctionne donc pour apperler une méthode d'une classe apparente LORS d'une surcharge. (afin d'éviter quelle ne s'apperlle elle même avec $this->calcul())
        // self::calcul() ne fonctionnerait pas non plus, car on essayerait d'appeler quelque chose de la classe courante (alors qu'ici, on a besoin de la classe parente)
        if($n <= 100){
            return "$n estinférieure ou égale à 100";
        } else {
            return "$n est supérieur à 100";
        }
    }
    public function autrCalcul(){
        $n = parrent::calcul(); // Il est possible d'atteindre une méthode de mon parent, mêm s'iln'ya pas de surcharge
    }
}
//------------------------------------------------------

$objetB = new B;
echo $objetB->calcul();
// affiche 10 est inférieur ou égale à 100 - j'ai redéclarer la méthode calcul() dans la classe enfant(B), cela s'appel une surcharge, je modifie légeèrement le comportement initial contenu dans le parent(A) via son enfant (B)

// -----------------------------------------------------------------------------------
/* une surcharge : permet de prendre en compte le comportemennt de la méthode héritée afin d'en bénéficier, tout en apportant un traitement complémentaire.

Différence entre self:: et parant::
        lorsque l'on utilise "self::" on demande d'utiliser ce qui est dans la classe courante ou ce que l'on a hérité sans l'avoir redéfinie dans notre class.
        Quand on utilise : "parent::" on demande d'utiliser les élément de la classe dont on a hérité

*/