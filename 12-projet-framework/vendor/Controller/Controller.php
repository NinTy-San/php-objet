<?php
// Controller général de l'application. Permet d'apperler des repository et contient nottament la méthode render() qui affiche un rendu à l'ecran, de manière générique.

namespace Controller;

class Controller{
    protected $table;

    public function __construct(){}
        
    public function getRepository($table){ // On récuper la table "employe" (Création pour instancier un objet EmployeRepository)


        $class = 'Repository\\' . $table . 'Repository'; 

        if(!isset($this->table) ){
            $this->table = new $class;  // On instancie un objet "employe" (si'iil n'existe pas !! donc oui la premiere fois )
        }
        return $this->table;
    }
    // $layout : Le design general du site / $templat : la viw qui rentre à l'interieur / $parameters : Les paramètre disponibles dans le layout et le template
    public function render($layout, $template, $parameters = array() ){

        $dirViews = __DIR__ . '/../../src/' . str_replace('\\', '/', get_called_class() . '/../ View');
        // get_called_class(): retourn le nom de la class depuis laquelle une methose static à été appelée

        $ex = explode('\\', get_called_class() ); // explode() transforme la chaine en tableau

        $dirFile = str_replace('Controller', '', $ex[2]); // On retire le mot controller grace à str_replace car dans la view, il y a un dossier au nom du module "Employe" et  non pas "ControllerEmploye"/

        $__template__ =  $dirViews . '/' . $dirFile . '/' / $template; //Chemin pour aller au bon endroit du template
        $__layout__ =  $dirViews . '/' . $layout . '/' / $template; //Chemin pour aller au bon endroit du layout

        extract($parameters, EXTR_SKIP); // extrac() permet de créer des variables au nom des indices 
        //EXTR_SKIP : permet lors d'une collision, de ne pas réécrire la variable existante

        ob_start(); // Enclanche la temporisation de la sortie. c'est à dire que ce qui suit ne se produit pas tout de suite, nous retenons l'affichage pour etre totalement MVC. ob_start() : enclanche la bufferisation de sortie, permet de mettre son site en "tampon" avant de l'afficher grâce à ob_end_flush ( on veut le faire en dernier pour respecter le MVC)

            require $__template__; // permet de mettre le contenu dans une variable et avec la ligne du dessous, l'envoie des données est retenue

            $content = ob_get_clean(); // Le template sera représenteé par $content. Cette variable est utiliser dans un layout. $content sera le require. Il représente le contenu du fichier indiqué par ^template

        ob_start();

            require $__layout__; // ob_start() va retenir l'envoie des données.

        return ob_end_flush(); // Envoie le contenu du tampon de sortie (s'il existe) et éteint la temporistation de sortie
    }
}
