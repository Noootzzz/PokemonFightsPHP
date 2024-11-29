<?php

//Fonction qui permet de définir les caractéristiques d'un pokémon de type feu

class PokemonFeu extends Pokemon
{                  //On hérite de la classe Pokemon
    protected string $attaqueNom = "Lance-Flammes";
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $bonus = $adversaire->type === 'Plante' ? 10 : 0;          //si l'ennemi est de type plante alors il prend + de degat sinon il prend 0 de degats en plus
        $adversaire->recevoirDegats($this->puissanceAttaque + $bonus);
    }
    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueNom;   
    }
}



//Faire les get et tout