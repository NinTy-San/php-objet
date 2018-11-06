<?php
class Plombier{
    public function getSpecialite(){
        return 'tuyaux, robinets, compteurs, etc... <br>';
    }
    public function getHoraires(){
        return '8h00-19h00 <br>';
    }
}
//----------------------------------------------
class Electricien{
    public function getSpecialite(){
        return 'Disjoncteurs, pose de cable, tableaux electriques, etc...<br>';
    }
    public function getHoraires(){
        return '10h00-18h00 <br>';
    }
}
//----------------------------------------------
class Entreprise// La classe Entreprise n'herite pas d'une autre classe
{
    public $numero = 0;
    public function appelEmploye($employe){
        $this->numero++;
        $this->{"monEmploye". $this->numero } = new $employe;
        //1er appel : je déclare la variable $this->monEmploye1 = new Plombier;

        return $this->{"monEmploye" . $this->numero };
    }
}
//------------------------------------------------------
$entreprise = new Entreprise; 

$entreprise->appelEmploye('Plombier');

var_dump($entreprise);
echo '<hr>';
echo $entreprise->monEmploye1->getSpecialite();
echo '<br>';
$entreprise->appelEmploye('Electricien');
echo $entreprise->monEmploye2->getSpecialite();