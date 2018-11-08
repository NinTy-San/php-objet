<?php
require_once(__DIR__ . '/../vendor/Autoload.php');

// Exemple de test :
//tetst -1 ---------------------------------------------------------------------
// $emp= new Entity\Employe;
// var_dump($emp);

// $emp->setPrenom('marco');
// echo '<br>';
// echo $emp->getPrenom();

//tetst -2 ---------------------------------------------------------------------

// $pdom = Manager\PDOManager::getInstance();

// var_dump($pdom);

// echo '<br>';

// $pdom = Manager\PDOManager::getInstance();

// var_dump($pdom);

//tetst -3 ---------------------------------------------------------------------

$er = new Manager\EntityRepository;

var_dump($er);

$resultat = $er->findAll();
var_dump($resultat);

