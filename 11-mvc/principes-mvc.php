<?php
/* 
    Structure MVC : 
    M : Modele          => Echange avec la BDD(Requête SQL)
    V : View            => Affichage et présentation des données (HTML/CSS)
    C : Controller      => Traitement (PHP)


    Exemple : 
        - Dans le model :       Je fais ma requête SQL qui va aller récupérer tous les produit de la BDD
        - Dans le Controller :  Je fais des traitements (php) et decide d'afficher uniquement des produits 10 par 10 
        - Dans la view :        Je présente les données ( avec affichage HTML/CSS) qui sortent du traitement (controller)
                                issue de la requete SQL (Model)

                                Un seul et unique point d'entrée : l'index.


                Les Frontcontroller (FC) 

    Modele                               Modele

    Backcontroller1 (BC)                 Backcontroller2
    View                                 View

    exemple : Si un internaute clic sur un lien, il déclanche une action dans la view qui va relancer le Frontcontroller qui va choisir le Backcontroller et qui communiquera son model et la view correspondante.

    --------------------------------------------------------------------

    Avantages : 
        -clarté de l'architecture : si le SGBD doit changer, on ouvrira les fichiers models que le développeur utilisera
                                    Si le design doit changer l'intégrateur ne riisque pas de créer des conflits dans les traitements du code
        -favorise le travail collaboratif

    Inconvénients :
        -nombre de fichiers (trop complexe pour des petites applications, le temps accordé à l'architecture ne serait pas rentable sur le projet)

    ---------------------------------------------------------------------------------------------
    Schématisation de l'arboréscence

    Model/
        -membre
            --fonction.inc.php
    
    View/
        -membre
            --connexion.html
            --inscription.html
            --profil.html
        -404.html
        -haut-site.html
        -menu.html
        -bas-site.html
        -style.css

    Controller/
        -membre
            --connexion.php
            --inscription.php
            --profil.php
        */