<?php
function inclusionAutomatique($nomDeLaCasse){
    include_once( $nomDeLaCasse . '.class.php');

    echo 'On passe dans inclusionAutomatique ! <br>';
    echo "require($nomDeLaCasse.class.php);<br>";
}
//------------------------------------------------------

spl_autoload_register('inclusionAutomatique');
//------------------------------------------------------
// spl_autoload_registrer() : permet d'xécuter une fonction lorsque l'interupteur voit passer un 'new' dans le code
// le nom à coté du 'new' est récupéré et transmis automatiquement à la fonction
// ATTENTION !! Pour que l'autoload fonctionne, il est INDISPENSABLE de respecter une convention de nommage sur les fichiers.