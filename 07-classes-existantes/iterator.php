<?php
// Pattern : Iterator 
// Pattern : permet de proposer une solution commune pour résoudre des problème récurrents.
// Iterator : permet de parcourir des éléments de nature différentes.

$fruit = array (
    'p' =>  'pomme',
    'f' =>  'fraise',
    'c' =>  'cerise'
);

$it1 = new ArrayIterator($fruit);

print '<pre>';
    print_r(get_class_methods($it1));
print '</pre>';

echo '<hr>';

$it1->rewind(); // permet de se placer au début du tableau

while ($it1->valid() ) { // valid() permet de verifier s'il y à des infos à parcourir
    echo $it1->key() . ' => '. $it1->current() . '<br>'; // key() : affiche l'indice / current() affiche la valeur
    $it1->next(); // next() permet de passer à l'"l"ment suivant
}

echo '<hr>';
// ----------------------------------------
$it2 = new DirectoryIterator('..'); // Ou $it2 = new DirectoryIterator ('.');

// print '<pre>';
//     print_r(get_class_methods($it2));
// print '</pre>';

$it2->rewind();

while($it2->valid() ){

    echo $it2->key() .' => '. $it2->current() . '<br>';
    $it2->next();

}

echo '<hr>';
//------------------------------------------------------------------------
class Listing{
    public function getListing($it){
        $it->rewind();

        while($it->valid() ){

            echo $it->key() .' => '. $it->current() . '<br>';
            $it->next();

        }
        echo '<hr>';
    } 

}
//---------------------------------------------------
$listing = new Listing;

$listing->getListing($it1);
$listing->getListing($it2);