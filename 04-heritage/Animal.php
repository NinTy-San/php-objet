<?php
class Animal{
    protected function deplacement(){
        return 'Je me déplace <br>';
    }
    public function manger(){
        return 'Je mange <br>';
    }
}
class Elephant extends Animal{
    public function quiSuisJe(){
        return 'je suis un Elephant et ' . $this->deplacement() .'<br>'; // On utilise la fonction deplacement() issue de ma classe Animal par heritage et qui est 'protected'. Et cette foncton protected est UNIQUEMENT exécutable dans le parent (la classe Animal) ou dans l'enfant (la classe Elephant). Je n'utilise pas Animal:: seulement dans le cas où je l'aurais redéfini. 
    }
}
class Chat extends Animal{
    public function quiSuisJe(){
        return 'je suis un Chat <br>';
    }
       public function manger(){ // Red
        return 'je mange comme un Chat <br>';
    }
    
}
// ---------------------------------------------------------------------------------
$elephant1 = new Elephant;
echo 'elephant1 : ' . $elephant1->manger();
echo 'elephant1 : ' . $elephant1->quiSuisJe();
// echo 'elephant1 : ' . $elephant1->deplacement(); // Erreur, J'herite bien de la m"thode deplacement() mais je ne peux faire appel à elle que DANS UNE CLASSE !!

$chat1 = new Chat;
echo 'chat1 : '. $chat1->manger(); // Linteppreteur cherche dans la class Chat, et SEULEMET SI n'exuste pas il aurrai cherché la méthode dans la classe dont j'heitee.