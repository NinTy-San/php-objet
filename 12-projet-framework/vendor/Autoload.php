<?php 
class Autoload{
    public static $nb = 0; // permet de compter le nombre de fois où l'on passe ici

    public static function  className($className){
        echo '<pre>' . self::$nb . '- Autoload : ' . $className;
        $tab = explode('\\', $className); // explode permet de prendre une chaine de caractère et de la transformer en array. ici, on cherche le caractère '\' MAIS si on ne met qu'un seul backslash, c'est comme si on voulait échapper la quote (') d'où l'intéret de mettre de 2 backslash (\\)

        if($tab[0] == 'backoffice'){ // L'explode nous permet de savoir si l'on doit reculer d'un dossier pour aller chercher un modul spécifique (bundle) 
            $path = __DIR__ . '/../src' . implode('/', $tab). '.php'; // On remet chaque element du tableu avec un '/'
        }else{

            $path = __DIR__ . '/' . implode('/', $tab) . '.php';
        }
        echo "\n => $path </pre><hr>"; // permet de voir les classes instanciées grâce à l'autoload.

        require $path;

        self::$nb++;
    }
}

spl_autoload_register( array('Autoload', 'className') ); // Lorsque l'on utilise l'autoload sur une class, il faut passer un array et la méthode doit être static.