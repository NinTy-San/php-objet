<?php
// Namespace : On peut y stocker des 'methodes' et des 'class'
namespace A{
    function ville(){

        return 'Paris';
    }
    function strlen(){
        return 'Fonction strlen de A';
    }
}
// ----------------------------------------------------------
namespace B{
    function ville(){
        
        return 'Nantes';
    }
    function strlen(){
        return 'Fonction strlen de B';
    }
}
// ----------------------------------------------------------
// Il ne faut pas mettre de code apres avoir définie des 'namespace' cela engendre une erreur ! 
// pour faire appel a nos namespace, il faut créer un autre fichier, un fichier d'appel
// echo A\ville();
// echo B\ville();