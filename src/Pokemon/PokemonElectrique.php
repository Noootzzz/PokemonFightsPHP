<?php


//Fonction qui permet de définir les caractéristiques d'un pokémon de type electrique

class PokemonElectrique extends Pokemon
{                  //On hérite de la classe Pokemon
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $bonus = $adversaire->type === 'Eau' ? 20 : 10;          //si l'ennemi est de type eau alors il prend + de degat sinon il prend 10 de degat
        $adversaire->recevoirDegats($this->puissanceAttaque + $bonus);
    }
}



//Faire les get et tout