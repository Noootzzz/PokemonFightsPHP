<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonElectrique.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/classes/Attaque.php';
require_once 'src/classes/Combat.php';
require_once 'pokemons.php';

// Lire le fichier combat.json
$combatLog = file_get_contents('combat.json');
$combatLogArray = json_decode($combatLog, true);

if(isset($_POST['pokemon1']) && isset($_POST['pokemon2']))
{
    $pokemon1Index = $_POST['pokemon1'];
    $pokemon2Index = $_POST['pokemon2'];

    $pokemon1 = $pokemons[$pokemon1Index];
    $pokemon2 = $pokemons[$pokemon2Index];

    $combat = new Combat($pokemon1, $pokemon2);
    $log = $combat->demarrerCombat();
}
else
{
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
    
</head>
<body>
    <main>
        <h2>Combat !</h2>
        <a href="index.php">Retour à la sélection des pokémons</a>
        <div id="combatLog"></div> <!-- Conteneur pour afficher les logs -->
    </main>

    <script>
        // Tableau JSON de logs
        const combatLogs = <?php echo json_encode($combatLogArray); ?>;
        
        // Afficher les logs avec un délai d'1 seconde entre chaque
        let currentIndex = 0;
        const logContainer = document.getElementById('combatLog');

        function afficherLog() {
            if (currentIndex < combatLogs.length) {
                const newLog = document.createElement('p');
                newLog.textContent = combatLogs[currentIndex];
                logContainer.appendChild(newLog);
                currentIndex++;
                setTimeout(afficherLog, 700);
            }
        }

        window.onload = function() {
            afficherLog();
        };
    </script>
</body>
</html>
