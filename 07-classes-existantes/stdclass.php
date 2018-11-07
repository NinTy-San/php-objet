<?php
$tab = array('orange', 'fraise', 'poire');

$objet1 = (object) $tab; // transformation (cast)

var_dump($objet1);

// Un objet fait parti de la STDCLASS (classee standard de php) lorsque celui-ci est 'orphelin' et n'a pas été  instancié par "new".
 echo '<br>';
 
 $objet2 = new StdClass();
 $objet2->titre = 'PoleS';
 var_dump($objet2);