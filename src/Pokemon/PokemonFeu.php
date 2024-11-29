<?php

//Fonction qui permet de définir les caractéristiques d'un pokémon de type feu

class PokemonFeu extends Pokemon
{                  //On hérite de la classe Pokemon
    protected Attaque $attaqueSpeciale;
    protected string $attaqueSpecialeNom;
    protected int $bonus = 0;

    public function __construct(string $nom, int $pv, int $puissanceAttaque, int $defense)
    {
        parent::__construct($nom, "Feu", $pv, $puissanceAttaque, $defense);
        $this->attaqueSpecialeNom = "Lance-Flammes";
        $this->attaqueSpeciale = new Attaque($this->attaqueSpecialeNom, 12, 87);
    }
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $this->bonus = $adversaire->getType() === "Eau" ? 10 : 0;
        echo "{$this->nom} utilise sa capacité spéciale : {$this->attaqueSpecialeNom} !\n";

        // Chance d'exécuter l'attaque spéciale avec précision
        $this->attaqueSpeciale->executerAttaque($adversaire);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueSpecialeNom;
    }
    public function getBonus(): int 
    {
        return $this->bonus;
    }
}



//Faire les get et tout