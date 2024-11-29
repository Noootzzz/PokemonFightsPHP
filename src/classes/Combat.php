<?php

class Combat
{
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;

    public function __construct(Pokemon $pokemon1, Pokemon $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function demarrerCombat(): void
    {
        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->estKO())
                break;

            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }

        $this->determinerVainqueur();
    }

    private function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur): void
    {
        // Choix aléatoire entre attaque de base (0) ou capacité spéciale (1)
        $action = rand(0, 1); // 0 pour attaque de base, 1 pour capacité spéciale

        if ($action === 0) {
            // Attaque de base
            echo "<p>{$attaquant->getNom()} attaque avec une attaque de base !</p>";
            $attaquant->attaquer($defenseur);
        } else {
            // Utilisation de la capacité spéciale
            echo "<p>{$attaquant->getNom()} utilise sa capacité spéciale !</p>";
            $attaquant->capaciteSpeciale($defenseur);
        }

        // Affichage des statuts des Pokémon après l'attaque
        echo "<p>" . $attaquant->afficherStatus() . " attaque " . $defenseur->afficherStatus() . "</p>";
    }

    private function determinerVainqueur(): void
    {
        if ($this->pokemon1->estKO() && $this->pokemon2->estKO()) {
            echo "<p>Les deux pokémons sont MORT hahahaha la honte</p>";
        } elseif ($this->pokemon1->estKO()) {
            echo "<p>{$this->pokemon2->getNom()} a gagné le combat !</p>";
        } else {
            echo "<p>{$this->pokemon1->getNom()} a gagné le combat !</p>";
        }
    }
}