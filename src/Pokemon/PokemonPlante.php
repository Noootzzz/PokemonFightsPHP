<?php



//Fonction qui permet de définir les caractéristiques d'un pokémon de type plante

class PokemonPlante extends Pokemon
{
    protected Attaque $attaqueSpeciale;
    protected string $attaqueSpecialeNom;

    public function __construct(string $nom, int $pv, int $puissanceAttaque, int $defense)
    {
        parent::__construct($nom, "Plante", $pv, $puissanceAttaque, $defense);
        $this->attaqueSpecialeNom = "Fouet-Lianes";
        $this->attaqueSpeciale = new Attaque($this->attaqueSpecialeNom, 12, 88);
    }
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $this->bonus = $adversaire->getType() === "Electrique" ? 10 : 0;
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