<?php
session_start();

if (isset($_GET['action'] )&& $_GET['action'] == 'vider'){
     unset($_SESSION['panier']);
}

if(isset($_GET['action']) && $_GET['action'] == 'create' || isset($_SESSION['panier']) ){
    $_SESSION['panier'] = array(26, 30, 54);
    echo 'Produit présents dans le panieer : ' . implode($_SESSION['panier'], ' - ') . '<br>';
    echo '<a href="?action=vider">vider le panier</a>';
}

if(isset($_GET['action']) && $_GET['action'] == 'vider'){
    unset($_SESSION['panier']);
} else {
    echo '<a href="?action=create"> Créer le panier</a>';
}

