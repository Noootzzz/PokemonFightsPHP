<?php


//Fonction qui permet de définir les caractéristiques d'un pokémon de type electrique

class PokemonElectrique extends Pokemon
{                  //On hérite de la classe Pokemon
    protected Attaque $attaqueSpeciale;
    protected string $attaqueSpecialeNom;

    public function __construct(string $nom, int $pv, int $puissanceAttaque, int $defense)
    {
        parent::__construct($nom, "Electrique", $pv, $puissanceAttaque, $defense);
        $this->attaqueSpecialeNom = "Onde-Electrique";
        $this->attaqueSpeciale = new Attaque($this->attaqueSpecialeNom, 15, 84);
    }
    public function capaciteSpeciale(Pokemon $adversaire, array &$log): void
    {
        $bonus = $adversaire->getType() === "Plante" ? 10 : 0;
        // Chance d'exécuter l'attaque spéciale avec précision
        $this->attaqueSpeciale->executerAttaque($adversaire,$bonus, $log);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueSpecialeNom;
    }
}



//Faire les get et tout