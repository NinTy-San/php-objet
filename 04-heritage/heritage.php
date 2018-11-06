<?php
class Membre
{
    public $id = 10;
    public $pseudo;
    public $mdp;

    public function __construct(){
        //traitements
        echo 'Internaute ! <br>';
    }
    public function inscription(){
        //traitements
        return "Je m'inscrit ! <br>";
    }
    public function seConnecter(){
        //traitements
        return 'Je me connecte ! <br>';
    }
}   
// ------------------------------------------
class Admin extends Membre // extends = héritage, comme include, ici on a un copier/coller du code de la classe Membre 
{
    public function accesBackOffice(){
        return 'Acces BackOffice ! <br>';
    }
}

$admin1 = new Admin; // Je crée un on objet admin qui herite de la classe Membre // Affiche la fonction construct()

echo $admin1->seConnecter(); // j'accède à la méthode par l'objet admin
echo $admin1->accesBackOffice();
echo $admin1->id; // j'accède à la propriété par l'objet admin

echo '<br>';
$membre1 = new Membre;

echo $membre1->seConnecter(); // j'accède à la méthode par l'objet admin
echo $membre1->id; 
echo $membre1->accesBackOffice(); // Erreur !! La méthode accesBackOffice() n'est pas dans ma classe Membre et je n'ai pas d'héritage de ma classe admin donc je ne peux pas accéder à cette méthode

// LORS D'UN HERITAGE, ON HERITE DE TOUT  !!! (même ce qui est private !)