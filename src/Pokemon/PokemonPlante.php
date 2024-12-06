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
    public function capaciteSpeciale(Pokemon $adversaire, array &$log): void
    {
        $bonus = $adversaire->getType() === "Electrique" ? 10 : 0;
        // Chance d'exécuter l'attaque spéciale avec précision
        $this->attaqueSpeciale->executerAttaque($adversaire, $bonus, $log);
    }

    public function getCapaciteSpecialeNom(): string
    {
        return $this->attaqueSpecialeNom;
    }

}

//Faire les get et tout