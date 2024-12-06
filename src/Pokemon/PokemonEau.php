<?php


//Fonction qui permet de définir les caractéristiques d'un pokémon de type eau


class PokemonEau extends Pokemon
{
    protected Attaque $attaqueSpeciale;
    protected string $attaqueSpecialeNom;
    protected int $bonus = 0;
    
    public function __construct(string $nom, int $pv, int $puissanceAttaque, int $defense)
    {
        parent::__construct($nom, "Eau", $pv, $puissanceAttaque, $defense);
        $this->attaqueSpecialeNom = "Hydrocanon";
        $this->attaqueSpeciale = new Attaque($this->attaqueSpecialeNom, 10, 85);
    }
    public function capaciteSpeciale(Pokemon $adversaire, array &$log): void
    {
        // On ajoute 10 de dégâts bonus si l'adversaire est de type feu
        $bonus = $adversaire->getType() === "Feu" ? 10 : 0;
        $this->attaqueSpeciale->executerAttaque($adversaire,$bonus, $log);
    }
    
    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueSpecialeNom;
    }
}

//Faire les get et tout
