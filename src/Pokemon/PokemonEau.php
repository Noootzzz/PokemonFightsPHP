<?php


//Fonction qui permet de définir les caractéristiques d'un pokémon de type eau


class PokemonEau extends Pokemon
{
    protected string $attaqueNom = "Hydrocanon";
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $bonus = $adversaire->type === 'Feu' ? 10 : 0;         //si l'ennemi est de type feu alors il prend + de degat sinon il prend 10 de degats en plus
        $adversaire->recevoirDegats($this->puissanceAttaque + $bonus);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueNom;   
    }
}

//Faire les get et tout
