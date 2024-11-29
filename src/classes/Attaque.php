<?php


class Attaque {     //On crée une classe Attaque pour l'apeller dans le fichier Pokemon.php
    private string $nom;
    private int $puissance;
    private int $precision;   //On ajoute la précision de l'attaque
    

    public function __construct(string $nom, int $puissance, int $precision){        
        $this->nom = $nom;
        $this->puissance = $puissance;
        $this->precision = $precision;
    }

    public function executerAttaque(Pokemon $adversaire): void {
        $chance = rand(1, 100);  //Générer un nombre aléatoire entre
        $totalPuissance = $this->puissance + $adversaire->getBonus();
        if ($chance <= $this->precision) {
            echo "L'attaque spéciale {$this->nom} a touché l'adversaire et inflige {$totalPuissance} dégâts ! <br>";
            $adversaire->recevoirDegats($this->puissance);
        } else {
            echo "L'attaque {$this->nom} a échoué ! <br>";
        }
    }
    
    public function getPuissance(): int
    {
        return $this->puissance;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}