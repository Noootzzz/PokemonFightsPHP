<?php

//Fonction qui permet de définir les caractéristiques d'un pokémon de type feu

class PokemonFeu extends Pokemon
{                  //On hérite de la classe Pokemon
    protected Attaque $attaqueSpeciale;
    protected string $attaqueSpecialeNom;

    public function __construct(string $nom, int $pv, int $puissanceAttaque, int $defense)
    {
        parent::__construct($nom, "Feu", $pv, $puissanceAttaque, $defense);
        $this->attaqueSpecialeNom = "Lance-Flammes";
        $this->attaqueSpeciale = new Attaque($this->attaqueSpecialeNom, 12, 90);
    }
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        echo "{$this->nom} utilise sa capacité spéciale : {$this->attaqueSpecialeNom} !\n";

        // Chance d'exécuter l'attaque spéciale avec précision
        $this->attaqueSpeciale->executerAttaque($adversaire);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueSpecialeNom;
    }
}



//Faire les get et tout