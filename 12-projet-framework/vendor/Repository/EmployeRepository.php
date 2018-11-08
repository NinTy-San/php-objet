<?php
// Cet classe contiendra les méthodes de 'Employe.php' et demandra l'execution à EtutyRepository
namespace Repository;

use Manager\Entityrepository; // l'utilisation du namespace perment l'extends de la classe lors de l'heritage alors qu'il n'y a ps eu l'instanciation.

class EmployeRepository extends Entityrepository{
    public function getAllEmploye(){
        return $this->findAll(); // findAll() provient de EntityRepository
    }
    
    public function getFindEmploye($id){
        return $this->find($id); // find($id
        ) provient de EntityRepository
    }
    
    public function registerEmploye(){
        return $this->register(); // register() provient de EntityRepository
    }
    
}