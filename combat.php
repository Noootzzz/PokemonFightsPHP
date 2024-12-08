<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonElectrique.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/classes/Attaque.php';
require_once 'src/classes/Combat.php';
require_once 'pokemons.php';

if (isset($_POST['pokemon1']) && isset($_POST['pokemon2'])) {

    // Lire le fichier combat.json
    $combatLog = file_get_contents('combat.json');
    $combatLogArray = json_decode($combatLog, true);

    $pokemon1Index = $_POST['pokemon1'];
    $pokemon2Index = $_POST['pokemon2'];

    $pokemon1 = $pokemons[$pokemon1Index];
    $pokemon2 = $pokemons[$pokemon2Index];

    $combat = new Combat($pokemon1, $pokemon2);
    $log = $combat->demarrerCombat();
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
    <link rel="stylesheet" href="style/css/combat.css">
</head>

<body>
    <main class="combat-arena">
        <div class="pokemon-container">
            <div class="pokemon" id="pokemon1">
                <img src="style/img/pokemonsplat/<?= $pokemon1->getNom(); ?>.png" alt="<?= $pokemon1->getNom(); ?>">
                <div class="health-bar">
                    <div class="health" id="health1" style="width: 100%;"></div>
                </div>
                <p class="pokemon-name"><?= $pokemon1->getNom(); ?></p>
            </div>
            <div class="pokemon" id="pokemon2">
                <img src="style/img/pokemonsplat/<?= $pokemon2->getNom(); ?>.png" alt="<?= $pokemon2->getNom(); ?>">
                <div class="health-bar">
                    <div class="health" id="health2" style="width: 100%;"></div>
                </div>
                <p class="pokemon-name"><?= $pokemon2->getNom(); ?></p>
            </div>
        </div>

        <div class="combat-log" id="combat-log"> <!-- Conteneur pour afficher les logs -->
            <h2>
                Combat entre <?= $pokemon1->getNom(); ?> et <?= $pokemon2->getNom(); ?>
            </h2>
        </div>
        <a href="index.php" class="animated-button">
            Retour
            <img src="style/img/Pokeball.png" alt="Pokeball">
        </a>
        <div class="limit"></div>
    </main>

    <script>
        // Tableau JSON de logs
        const combatLogs = <?php echo json_encode($combatLogArray); ?>;

        // Initialisation des PV
        let pokemon1MaxPv = 100; // Remplacez par la valeur initiale du Pokémon 1
        let pokemon2MaxPv = 100; // Remplacez par la valeur initiale du Pokémon 2
        let pokemon1CurrentPv = pokemon1MaxPv;
        let pokemon2CurrentPv = pokemon2MaxPv;

        const healthBar1 = document.getElementById('health1');
        const healthBar2 = document.getElementById('health2');
        const logContainer = document.getElementById('combat-log');

        // Afficher les logs avec un délai
        let currentIndex = 0;

        function afficherLog() {
            if (currentIndex < combatLogs.length) {
                const newLog = document.createElement('p');
                newLog.textContent = combatLogs[currentIndex];
                logContainer.appendChild(newLog);

                // Analyser les logs pour récupérer les dégâts
                const log = combatLogs[currentIndex];

                if (log.includes("STATUT")) {
                    const regex = /(Salamèche|Carapuce|Pikachu|Bulbizarre)-.*-(\d+)pv.*(Salamèche|Carapuce|Pikachu|Bulbizarre)-.*-(\d+)pv/;
                    const match = log.match(regex);

                    if (match) {
                        // Récupérer les noms et les PV extraits
                        const attackerName = match[1];
                        const defenderName = match[3];
                        const newPv1 = parseInt(match[2], 10);
                        const newPv2 = parseInt(match[4], 10);

                        // Log pour vérifier les valeurs extraites
                        console.log(`Nouveaux PV : ${attackerName} (${newPv1} PV) / ${defenderName} (${newPv2} PV)`);

                        // Vérifier que les valeurs extraites sont cohérentes avant la mise à jour
                        if (newPv1 < 0 || newPv2 < 0) {
                            console.error("Erreur : les PV extraits sont négatifs");
                            return;
                        }

                        // Mettre à jour les barres de vie en fonction des rôles
                        if (attackerName === "Salamèche" || attackerName === "Carapuce" || attackerName === "Pikachu" || attackerName === "Bulbizarre") {
                            updateHealthBars(newPv1, newPv2); // Mise à jour de la barre de vie
                        }
                    }
                }


                currentIndex++;
                setTimeout(afficherLog, 500); // Délais entre logs
            } else {
                // Tous les logs ont été affichés : déterminer le Pokémon avec le moins de PV
                finDuCombat();
            }
        }

        // Met à jour les barres de santé
        function updateHealthBars(pv1, pv2) {
            pokemon1CurrentPv = pv1;
            pokemon2CurrentPv = pv2;

            // Calcul du pourcentage restant
            const health1Percentage = (pokemon1CurrentPv / pokemon1MaxPv) * 100;
            const health2Percentage = (pokemon2CurrentPv / pokemon2MaxPv) * 100;

            // Mise à jour des styles
            healthBar1.style.width = `${health1Percentage}%`;
            healthBar2.style.width = `${health2Percentage}%`;

            // Couleurs dynamiques (facultatif)
            healthBar1.style.backgroundColor = health1Percentage > 50 ? 'green' : health1Percentage > 20 ? 'orange' : 'red';
            healthBar2.style.backgroundColor = health2Percentage > 50 ? 'green' : health2Percentage > 20 ? 'orange' : 'red';
        }

        // Fin du combat : ajuster la barre de vie du Pokémon avec le moins de PV à 0
        function finDuCombat() {
            if (pokemon1CurrentPv < pokemon2CurrentPv) {
                pokemon1CurrentPv = 0;
                healthBar1.style.width = '0%';
            } else if (pokemon2CurrentPv < pokemon1CurrentPv) {
                pokemon2CurrentPv = 0;
                healthBar2.style.width = '0%';
            }
        }

        // Lancer l'affichage des logs au chargement
        window.onload = function () {
            afficherLog();
        };
    </script>
</body>
</html>