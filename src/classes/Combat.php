<?php

class Combat
{
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;
    private array $log = []; // Pour stocker les messages du combat

    public function __construct(Pokemon $pokemon1, Pokemon $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function demarrerCombat(): array
    {
        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->estKO())
                break;

            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }

        $this->determinerVainqueur();
        // Sauvegarde des messages du combat dans un fichier JSON
        file_put_contents('combat.json', json_encode($this->log, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return $this->log;
    }

    private function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur): void
    {
        // Choix aléatoire entre attaque de base (0) ou capacité spéciale (1)
        $action = rand(0, 1); // 0 pour attaque de base, 1 pour capacité spéciale

        if ($action === 0) {
            // Attaque de base
            $this->ajouterLog("{$attaquant->getNom()} attaque avec une attaque de base !");
            $attaquant->attaquer($defenseur, $this->log);
        } else {
            // Utilisation de la capacité spéciale
            $this->ajouterLog("{$attaquant->getNom()} utilise sa capacité spéciale : {$attaquant->getCapaciteSpecialeNom()} !");
            $attaquant->capaciteSpeciale($defenseur, $this->log);
        }

        // Affichage des statuts des Pokémon après l'attaque
        $this->ajouterLog($attaquant->afficherStatus() . " attaque " . $defenseur->afficherStatus());

    }

    private function determinerVainqueur(): void
    {
        if ($this->pokemon1->estKO() && $this->pokemon2->estKO()) {
            $this->ajouterLog("Les deux pokémons sont MORT hahahaha la honte");
        } elseif ($this->pokemon1->estKO()) {
            $this->ajouterLog("{$this->pokemon2->getNom()} a gagné le combat !");
        } else {
            $this->ajouterLog("{$this->pokemon1->getNom()} a gagné le combat !");
        }
    }

    private function ajouterLog(string $message): void
    {
        $this->log[] = $message; // Ajouter le message au tableau des logs
    }
}