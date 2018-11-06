<?php
abstract class Joueur{
    public function seConnecter(){
        return $this->etreMajeur();
    }
    abstract public function etreMajeur(); // les méthodes abtraites n'ont pas de contenu
    abstract public function devise();
}
//--------------------------- 
class JoueurFr extends Joueur{
    public function etreMajeur(){ // OBLIGATION de redéfinir la méthode ma classe parente sino on obtien une erreur
        return 18;
    }
    public function devise(){
        return '€';
    }
}
//------------------------------------------------------
class JoueurUs extends Joueur{
    public function etreMajeur(){ // OBLIGATION de redéfinir la méthode ma classe parente sino on obtien une erreur
        return 21;
    }
    public function devise(){
        return '$';
    }
}
// $joueur = new Joueur; // Erreur, une classe abstraite n'est pas instanciable !!!
$joueurFr = new JoueurFr;
echo $joueurFr->seConnecter() . '<hr>';

$joueurUs = new JoueurUs;
echo $joueurUs->seConnecter();

//---------------------------------------------------------
/*
    Une classe abstraite (abstract) N'EST PAS INSTANCIABLE ! 
    Les méthodes abstraites (abstract) N'ONT PAS de contenu ! 
    Lorsque l'on hérite des méthodes abstraitess, il est NECESSAIRE que la CLASSE qui les CONTIENT soit ABSTRAITE !!
    Par ailleurs, une classe abstraire peut contenir des méthodes normales   
*/
