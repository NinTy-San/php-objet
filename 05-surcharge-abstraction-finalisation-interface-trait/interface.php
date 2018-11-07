<?php
interface Mouvement{
    public function deplacement();
}
//-----------------------------------------------
class Bateau implements Mouvement{ // class Bateau extends Mouvement NE FONCTIONNE PAS 
    public function deplacement(){} // obligation de recréer les méthode de l'interface qu'on implémente pour éviter une erreur
}
//-----------------------------------------------
class Avion implements Mouvement{
    public function deplacement(){}
}
//--------------------------------------------------------------------------------------------
// new Mouvement; // Erreur, une interface n'est pas instanciable
//--------------------------------------------------------------------------------------------
/* 
    Une interface : est une liste de méthodes (SANS CONTENU) qui permet de garantir que toutes les classes qui implémente l'interface contiendront les méthodes de l'interface avec la même signature (Le même nom !) C'est une sorte de 'contrat' qui garantie un minimum de méthode avec la boonne orthographe.
        Ex : Une interface n'est pas un héritage. 
        Un Bateau hérite de Vehicule
        Un Avion hérite de Vehicule
        Mais un Bateau, ou un Avion n'herite pas de Mouvement, c'est juste un point commun entre cess classes (Bateau, Avion...)

        Le développeur qui réalise les appels est certain de pouvoir effectuer : 
            $bateau->deplacement();
        il faut savoir qu'avec l'interface il ne devra pas faire $bateau->seDeplacer(); donc pas besoin d'ouvrir la classe en question. Et il ne devra pas créer dans la classe Bateau une méthode seDeplacer().
        Une interface permet de créer une formalité.
        Si le code des classes doit changer, cela ne changera pas les appels car la méthode deplacement() devra toujours etre présente.
    - class extends class (héritage)
    - interface extends interface (héritage)
    - class implements interface (implémentation)

    Les interfaces permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter.
    Toutes les méthodes déclarées dans une interface DOIVENT ETRE 'public' et redéfinies dans las classe qui implémente.
    Lorsque je veux me servir d'une interface : j'utilise le mot-clé 'imppléments' (pour une classe on utilise extends)
    Une interface n'est pas instanciabale  ! 
    On se sert d'une interface pour représenter un point cimun entre 2 classes. cela permet d'exiger un comprtement.
        ex : Un bateau et un avion herite de Vehicule Mais n'herite pas de mouvement. Un vehicule et in mouvement n'existe pas.
    Il est possible d'implémenter plusieur interface (on ne peut pas hériter de plusieur classes)
    PAS DE POSSIBILITER d'avoir des propriétés dans une interface. (on peut par contre, déclarer des constantes dans uner interface)
*/
//---------------------------------------------------------------------------------------------
// Implementation de plusieur interface :
interface iA{
    public function testA(); // Pas de visibilite private car les méthode doivent etre redéfinie.
}

interface iB{
    public function testB(); 
}
class A implements iA, iB{ // implementation de 2 interface A CONDITION que celles-ci n'aient aucune méthode portant le même nom !!!
public function testA(){}
public function testB(){}
}
//------------------------------------------------
interface iC{
    public function test1();
}
interface iD{
    public function test2();
}
interface iE extends iC, iD{ // heritage entre multiple interfaces
    public function test3();
}

class B implements iE{
    // pour gérer les erreurs, il faut absolument écrire les méthodes de iE, iC et iD
    public function test1(){}
    public function test2(){}
    public function test3(){}
}
//------------------------------------------------
//heritage + implementation :
class C{}
class D extends C implements iA{
    public function testA(){}
}
//------------------------------------------------
    