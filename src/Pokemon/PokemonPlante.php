<?php



//Fonction qui permet de définir les caractéristiques d'un pokémon de type plante

class PokemonPlante extends Pokemon
{
    protected string $attaqueNom = "Fouet-Lianes";
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $bonus = $adversaire->type === 'Eau' ? 20 : 10;          //si l'ennemi est de type eau alors il prend + de degat sinon il prend 10 de degat
        $adversaire->recevoirDegats($this->puissanceAttaque + $bonus);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueNom;   
    }
}



//Faire les get et tout