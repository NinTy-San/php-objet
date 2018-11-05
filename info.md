3 moyens de créer un site web de créer un site web
    - from scratch
    - cms
    - framework

****************************************************
Orienté objet : 
    Inconvenients :
        - Techniquement, on ne peut rien faire de plus avec l'orienté objet qu'avec le procedural.
        - En général, l'approche orienté objet est moins intuitive que l'approche procédural.
        Il est effectivement plus facile de décomposer un problème séquentiellement ligne par ligne qu'avec une interaction entre les objet. => permet une meilleure evolution vers les autres langages (C++, java, c#...)
        - Légère perte de performance, car on passe par des métthodes (get et set) au lieu de travailler directement sur la variable ou la structure. 

    Avantages :
        - Modulariser afin d'avoir un code évolutif. Si on a une série de if/else à changer à droite à gauche, en procédural il faudrait aller dans tous les fichier dans lequel on doit faire des modifications alors qu'avec l'OO on aura juste à modifier le modul correspondant.
        - Encourage le travail collaboratif. (pas besoin de ré-ouvrir toutes les pages, l'UM permet de décrire le comportement de l'application et l'interaction entre objet).
        - Masquer la complexité grâce au principe d'encapsulation.
            => en effet, c'est plus simple de lire :
            panier->affichage() plutot qu'une série de if/else et boucle. 
        - Possibilité de documenter son code.
        - Ré-utiliser le code, ne pas repartir de zéro, effectuer un code type pouvant  être repris sur d'autre projets.
        - Faciliter la maintenance et les mise à jour.
            => tout se passe dans la classe en question.
        - Assouplir le code, factorisation du code : meilleure conceptualisation.
            => Les pages seront moins chargées.
        - Permet d'appréhender beaucoup plus simplement d'autre langage (java, .net, c++, c#...).
        - Plus d'option dans le language (encapsulatioon, héritage, execption, interface...).

****************************************************************************************************

Vocabulaire : 

    Variable =  Propritété (= attribut)
    Fonction = Methode
    Objet = Instance

    Une variable permet de contenir une information
    Un array permet de contenir plusieurs informations
    Une classe permet de contenir : des propriétés et des méthodes comportant des traitements.
    L'objet qui va permettre d'atteindre les éléments contenus dans la classe.

        Classe :    (= plan, modèle)
                    Une classe est un regroupement d'informations (propriétés, valeurs, méthodes) relatives à un sujet global.
        Objet :     (= application du plan)
                    Un objet permet d'atteindre / d'accéder aux informations contenues dans la classe.

        Exemple : classe Voiture
                    objet = 'objet voiture'
                    propriétés : $couleur, $taille, etc...
                    méthodes : démarrer(), rouler(), etc..

3 bonnes questions à se poser lorsque l'on développe:
    - Mon projet est-il compréhensible pour les autres développeurs ?
    - Mon projet est-il ré-utilisable par un autre développeur ou devra-t-il ré-écrire toutes les classes ?
    - Mon projet prévoit-il les évolution futures ?