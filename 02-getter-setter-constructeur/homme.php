<?php
Class Homme
{
    private $prenom;
    private $nom;
    public function setPrenom($p){ // Par convention, On appel la fonction avec le mot-clé 'set'. On va setter un prénom, c'est à dire lui attribuer/affecter une valeur.
        // $prenom = $p; // Cette variable est locale, il ne s'agira donc pas de la variable $prenom de l'objet
            if(is_string($p)){
                $this->prenom = $p;
        }
    }
    public function getPrenom(){ // Par convention, On appel la fonction avec le mot-clé 'set'. On va setter un prénom, c'est à dire lui afficher une valeur.
        
        return $this->prenom;
    }
    public function setNom($n){
        $this->nom = $n;
    }
    public function getNom(){
        return $this->nom;
    }
}

$homme1 = new Homme();
$homme1->setPrenom('Arnaud'); // Je modifie l'élément (dans l'objet dans lequel on se trouve) car ma méthode est public

echo $homme1->getPrenom() . '<br>'; // Accéder à l'élément dans l'objet car ma méthode est public

$homme1->setNom('Dohou');
echo $homme1->getNom() . '<br>';

var_dump($homme1);
// -------------------------------------------

$homme2 = new Homme();
echo $homme2->getPrenom() .'<br>'; // Cette ligne n'affiche rien car j'ai réinstancié la classe Homme pour créer un objet homme2
echo $homme2->getNom() .'<br>'; // Cette ligne n'affiche rien car j'ai réinstancié la classe Homme pour créer un objet homme2

var_dump($homme2);

// ----------------------------------------------------------------
/* 
    Pourquoi des getters et setters :
    PHP est un language objet qui ne type pas ses variables, il faut donc prévoir autant de sette et de getter que de propriété afin de contrôler l'intégrité des données.
    Pour 10 propriétés, y aura donc 20 méthodes (10 setters et 10 getters)
    
    $this représente l'objet en cours, ici, à l'intérieur de la classe
        objet en-cours = objet qui execute la méthode

    Les getters : voir / afficher
    Les setters : attribuer / affecter
        => Les 2 réunis permettent de contrôler l'intégralité des données.

    Mettre les propriétés en 'private' permet d'éviter qu'elles ne soient modifiées de l'exterieur de la classe sans controle.
*/