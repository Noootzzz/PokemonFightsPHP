<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonElectrique.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/classes/Attaque.php';
require_once 'src/classes/Combat.php';
require_once 'pokemons.php';

if(isset($_POST['pokemon1']) && isset($_POST['pokemon2']))
{
    $pokemon1Index = $_POST['pokemon1'];
    $pokemon2Index = $_POST['pokemon2'];

    $pokemon1 = $pokemons[$pokemon1Index];
    $pokemon2 = $pokemons[$pokemon2Index];

    $combat = new Combat($pokemon1, $pokemon2);
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

        <div class="combat-log" id="combat-log">
            <h2>
                Combat entre <?= $pokemon1->getNom(); ?> et <?= $pokemon2->getNom(); ?>
            </h2>
            <?= $combat->demarrerCombat(); ?>
        </div>
        <a href="index.php" class="animated-button">
    Retour
    <img src="style/img/Pokeball.png" alt="Pokeball">
</a>
        <div class="limit"></div>
    </main>

    <script src="combat.js"></script>
</body>
</html>