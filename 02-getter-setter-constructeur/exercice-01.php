<?php
/* 
    Exercice :
        Créer une classe memebre avec les propriétés pseudo et mdp
            class Membre{
                private $pseudo; (Le pseudo doit être inférieur à 15 caractèrres et supérieur à 0... ET que ce soit un string !!)
                private $mdp;
            }
        
        =>Objectif : afficher le pseudo et mdp  

*/

class Membre{
    private $pseudo;
    private $mdp;

    public function setPseudo($p){
        if(is_string($p) && strlen($p) > 0 && strlen($p) < 15){ // !is_numeric
            $this->pseudo = $p;
        }
        
    }
    public function getPseudo(){
        return $this->pseudo;
    }
           
    public function setMDP($password){

            $this->mdp = $password;

    }
    public function getMDP(){
        return $this->mdp;
    }
           
}      

$membre1 = new Membre;

$membre1->setPseudo("NineTy'San");
$membre1->setMDP(123);

echo $membre1->getPseudo() . '<br>';
echo $membre1->getMDP() . '<br>';
