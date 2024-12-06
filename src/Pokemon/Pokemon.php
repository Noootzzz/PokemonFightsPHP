<?php


abstract class Pokemon
{     //Classe abstraite Pokemon

    protected string $nom;
    protected string $type;
    protected int $pv;
    protected int $puissanceAttaque;
    protected int $defense;

    protected int $bonus = 0;

    public function __construct(string $nom, string $type, int $pv, int $puissanceAttaque, int $defense)
    {        //Constructeur de la classe Pokemon
        $this->nom = $nom;
        $this->type = $type;
        $this->pv = $pv;
        $this->puissanceAttaque = $puissanceAttaque;
        $this->defense = $defense;
    }

    public function attaquer(Pokemon $adversaire, array &$log): void
    {
        //Attaque basique -> puissance d’attaque de base - défense de l’adversaire
        $degats = max(0, $this->puissanceAttaque - $adversaire->defense);
        $adversaire->recevoirDegats($degats, 0, $log);
    }

    public function recevoirDegats(int $degats, int $bonus, array &$log): void
    {
        $this->pv -= ($degats + $bonus);
        if ($this->estKO()) {
            $this->pv = 0;
        }
        if ($this->pv <= 0) {
            $log[] = "{$this->nom} est KO !";
        }
    }

    public function estKO(): bool
    {         //Fonction qui permet de savoir si le pokemon est KO
        return $this->pv <= 0;
    }

    abstract public function capaciteSpeciale(Pokemon $adversaire, array &$log): void;   //Fonction abstraite capaciteSpeciale
    abstract public function getCapaciteSpecialeNom(): string;       //Fonction abstraite capaciteSpecialeNom

    public function afficherStatus(): string
    {   //Fonction qui permet d'afficher le status du pokemon
        return "{$this->nom}-{$this->type}-{$this->pv}pv";
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getType(): string
    {
        return $this->type;
    }

}
