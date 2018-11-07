<?php
function recherche($tab, $element){
    if(!is_array($tab) ){
        die('Vous devez envoyer un Array !'); // Die(permet d'arreter les traitement)
    }
    $position = array_search($element, $tab);
    return $position;
}
// ---------------------------------------------------------------------------------------------------
$liste = array('orange', 'fraise', 'pomme');

    echo recherche ($liste, 'fraise') . '<br>'; // affiche 1 (ici, la posistion de 'fraise' dans mon tableau $liste)
    
    echo recherche ('tableau', 'fraise') . '<br>'; 

    echo 'Traitement php...';