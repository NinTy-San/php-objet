<?php

require_once('namespace-ab.php');
// erreur : On ne peut pas déclarer deux fonction avec le même nom
// fuction test(){};
// fuction test(){};

echo A\ville();
echo '<br>';
echo A\strlen();
echo '<br>';
echo B\ville();
echo '<br>';
echo B\strlen();
echo '<br>';

//---------------------------------------------------
/* 
    Les namespace permettent de classer mes 'class'
    Pratique pour classer les fonction
    Evite à plusieurs développeurs travaillant sur le même proget de rentrer en colision lors d'uun nommage d'une méthode ou d'une classe

*/