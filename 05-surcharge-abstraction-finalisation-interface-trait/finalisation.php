<?php
final class Application{ // 'final' indique que la classe Application NE POURRA PAS ETRE HERITEE.
    public function lancementApp(){
        return " l'appli de lance comme cela !";
    }

}
// Class Extension extends Application{} // erreur; on en peut pas hériter d'une classe "final".

$app = new Application;
$app->lancementApp(); . '<br>';
//-----------------------------------------------
class Application2
{
    final public function lancementApp(){
        return "l'appli se lance comme cela !";
    }
}
// ---------------------------------------
class Extension2  extends Application2{
    // public function lancementApp() // Erreur, on ne peut pas surcharger ou redéfinnir la méthode car elle est 'final' dans la classe parente 'Application2'
}
$extension2 = new Extension2;
echo $extension2->lancelentApp();
//---------------------------------------
/* 
    Une classe finale NE PEUT ETRE héritée
        Une classe finale aura forcément des méthode qui ne pourront pas être surchargéee ou redéfinies. (pas d'intérêt à mettre le mot-clé 'final' sur les méthodes d'une classe 'final') Une classe 'final' peut contenir des méthodes normales (mais cela n'a aucun intér^t car on ne peut pas hériter d'une ckasse 'final' donc il n'y a aucun risque que les méthodes soient redéfinies).
        Une méthode private avec le mot-clé 'final n'a aucun  interet (car on peux les modifier qu'a l'intérieur de la classe, elles ne risqueent donc pas de pouvoir etre surchgargée).
    Une classe 'final' reste instanciable ! 
    Une méthode 'final'peut être présente dans une classe 'normale'
    Une méthode 'final' permet d'éviter qu'elle soit redéfinie ou surchargée.

    L'intérêt du mot-clé 'final' sur une méthode est de vérouiller afin d'empécher toute 'sous-class' de la redéfinir ( quand nous voulons etre sur que le comportement d'une méthode est preservée durant l'heritage).
*/