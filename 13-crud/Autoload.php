<?php

class Autoload{
    public static $nb = 0; // Permet de compter le nombre de fois où l'on passe dans l'auoload

    public static function className($className){

        $tab = explode('\\', $className);

        if($tab[0] == 'BackOffice'){
          
            $path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';
        }else{
            
            $path = __DIR__ . '/' . implode('/', $tab) . '.php';
        }
        require $path;
        self::$nb++;
    }
}
spl_autoload_register(array('Autoload', 'className'));