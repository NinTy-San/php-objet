<?php 
class A{
    public function direBonjour(){
        return 'Bonjour';
    }
}
// --------------------------------------
class B { // la classe B n'hérite PAS de la classe A
    public $maVariable;
    // Ici, on a un objet dans un objet, il n'y a pas d'heritage

    public function __construct(){
        $this->maVariable = new A; // je crée un objet A que je place dans ma propriété '$maVariable' de mon objet B
    }
    public function maMethode(){
        return $this->maVariable->direBonjour();
        // Dans mon objet B ($this), je peux appeler les méthodes sur mon objet A ($this->maVariable)
        // objet B -> objet A -> direBonjour()
    }
}
// --------------------------------------
$b = new B;

echo $b->maVariable->direBonjour();
echo '<br>';
echo $b->maMethode();