<!-- UML:
---------------------
|    Vehicule		|                
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence()	|
---------------------

---------------------
|    Pompe   		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence()	|
|donnerEssence()	|
---------------------

1. Création d'un véhicule 1
2. Attribuer un nombre de litres d'essence au vehicule 1 : 5
3. Afficher le nombre de litres d'essence du vehicule 1

4. Création d'une pompe
5. Attribuer un nombre de litres d'essence à la pompe : 800
6. Afficher le nombre de litres d'essence de la pompe

7. la pompe donne de l'essence en faisant le plein (50L) à la voiture1
8. Afficher le nombre de litres d'essence pour la voiture1 après ravitaillement
9. Afficher nombre de litres d'essence restant pour la pompe

10. Faire en sorte que le véhicule ne puisse pas contenir plus de 50L d'essence (limite reservoir). -->

<?php
class Voiture
{
    private $litresEssence;

    public function setlitresEssence($litre){
        if(is_numeric($litre)){
            $this->litresEssence = $litre;
        }
    }

    public function getlitresEssence(){
       return $this->litresEssence;
    }
}

class Pompe
{
    private $litresEssence;

    public function setlitresEssence($litre){
        if(is_numeric($litre)){
            $this->litresEssence = $litre;
        }
    }

    public function getlitresEssence(){
       return $this->litresEssence;
    }
    
    public function donnerEssence(Voiture $v){
        $this->setLitresEssence($this->getlitresEssence() - (50 - $v->getlitresEssence() ) );
        // $v représente le véhicule reçu, $this représente le véhicule ) partir de laquelle la méthode est appelé
        // 800 - (50 - 5 ) = 800 - 745 = 755 
        $v->setlitresEssence( $v->getlitresEssence() + (50 - $v->getlitresEssence() )  );
        // 5 + (50 - 5) = 5 + 45 = 50
    }
}

// -1
$voiture1 = new Voiture;
//-2
$voiture1->setlitresEssence(5);
//-3
echo 'Littres d\'essence voiture1 : ' . $voiture1->getlitresEssence() . 'L <br>';
//-4
$pompe1 = new Pompe;
//-5
$pompe1->setlitresEssence(800);
//-6
echo 'Littres d\'essence pompe1 : ' . $pompe1->getlitresEssence() . 'L <br>';

echo '<br>';
//-7
$pompe1->donnerEssence($voiture1);
//-8
echo 'Littres d\'essence après ravitaillement voiture1 : ' . $voiture1->getlitresEssence() . 'L <br>';
//-9
echo 'Littres d\'essence après ravitaillement pompe1 : ' . $pompe1->getlitresEssence() . 'L <br>';

// ------------------------------------------

$voiture2 = new Voiture;
$voiture2->setlitresEssence(30);
echo '<br>';
echo 'Littres d\'essence voiture2 : ' . $voiture2->getlitresEssence() . 'L <br>';

$pompe1->donnerEssence($voiture2);

echo '<br>';
echo 'Littres d\'essence après ravitaillement voiture2 : ' . $voiture2->getlitresEssence() . 'L <br>';
//-9
echo 'Littres d\'essence après ravitaillement pompe1 : ' . $pompe1->getlitresEssence() . 'L <br>';