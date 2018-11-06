<?php 
trait TPanier{
    public $nbProduit = 1;
    public function affichageProduits(){
        return 'Affichage des produits. <br>';
    }
}
//-----------------------------------------
trait TMembre{
    public $nbProduit = 1;
    public function affichageMembres(){
        return 'Affichage des membres. <br>';
    }
}
//-----------------------------------------
class Site{
    use TPanier, TMembre; // utilisation des traits
}
// ---------------------------------------------------------------
$site = new Site;

echo $site->affichageProduits();
echo $site->nbProduit. '<br>';
echo $site->affichagemembres();

var_dump($site);
echo '<br>';
var_dump(get_class_methods($site));
echo '<br>';
// --------------------------------------------------------------------------------------------
/* 
Les tarits ont été inventé  pour reposser les limites de l'héritage
Une classe ne peut hériter que d'une seul classe à la fois. En revanche, elle peut importer (donc hériter) de plusieurs traits
Il est utile d'utiliser plusieurs traits quand l'une de vos classes a besoin d'une méthode 'x' de la classe A, 'y' de la classe B et 'z' de la classe C.

Un trait est instanciable. un trait est un regroupement de méthodes et de propriétés pouvant etre importées au sein d'une classe.
*/
// --------------------------------------------------------------------------------------------
trait A{
    public function a(){ return 'a';}
}
trait B{
    use A;
    public function b(){return 'b';}
}
class Test{
    use B;
}
// -----------------------------------
$objet = new Test;

echo $objet->a() .'<br>';
echo $objet->b() .'<br>';
// -----------------------------------
trait MonTrait{
    public function direBonjour(){echo 'hello';}
}
class MaClass{
    use MonTrait;
    public function direBonjour(){
        echo 'Bonjour !';
    }
}
$objet = new MaClass;
$objet->direBonjour(); // Affiche 'Bonjour'
// Si une classe déclare une méthode et qu'elle utilise un trait possédant cette meme méthode, ALORS la méthode déclarée dans la class l'emportera sur la méthode déclarée dans le trais

trait Z{
    public function direBonjour(){echo 'hello';}
}
class MaClass2{
    use Z{
    direBonjour as direHello;
    }
}
$objet2 = new MaClass2;
$objet2->direBonjour();
echo '<br>';
$objet2->direHello();