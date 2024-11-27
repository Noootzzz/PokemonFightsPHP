<?php


class Attaque {     //On crée une classe Attaque pour l'apeller dans le fichier Pokemon.php
    private string $nom;
    private int $puissance;
    private string $precision;   //On ajoute la précision de l'attaque


    public function __construct(string $nom, int $puissance, string $precision){        
        $this->nom = $nom;
        $this->puissance = $puissance;
        $this->precision = $precision;
    }

    public function executerAttaque (Pokemon $adversaire): void {       //Fonction qui permet d'attaquer un adversaire
        $degats = max(0, $this->puissance - $adversaire->defense);          //pas sur de ça (a tester)
        $adversaire->recevoirDegats($degats);           
    }
}