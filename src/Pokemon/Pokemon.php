<?php


abstract class Pokemon{     //Classe abstraite Pokemon

    protected string $nom;
    protected string $type;
    protected int $pv;
    protected int $puissanceAttaque;
    protected int $defense;

    public function __construct(string $nom, string $type, int $pv, int $puissanceAttaque, int $defense){        //Constructeur de la classe Pokemon
        $this->nom = $nom;              
        $this->type = $type;
        $this->pv = $pv;
        $this->puissanceAttaque = $puissanceAttaque;
        $this->defense = $defense;
    }

    public function attaquer(Pokemon $adversaire): void {           //Fonction qui permet d'attaquer un adversaire
        $degats = max(0, $this->puissanceAttaque - $adversaire->defense);
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats(int $degats): void {         //Fonction qui permet de recevoir des degats
        $this->pv -= $degats;
        if ($this->pv < 0) {
            $this->pv = 0;
        }
    }

    public function estKO(): bool {         //Fonction qui permet de savoir si le pokemon est KO
        return $this->pv <= 0;
    }   

    abstract public function capaciteSpeciale(Pokemon $adversaire): void;       //Fonction abstraite capaciteSpeciale

    abstract public function getCapaciteSpecialeNom(): string;       //Fonction abstraite capaciteSpecialeNom

    public function afficherStatus() : string{                  //Fonction qui permet d'afficher le status du pokemon
        return "{$this->nom} ({$this->type}): {$this->pv} PV";         
    }

    public function getNom(): string{           
        return $this->nom;
    }
}
