<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/Pokemon/PokemonElectrique.php';
require_once 'src/Classes/Combat.php';
require_once 'pokemons.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <main>
        <h2>Prépare toi au combat</h2>
        <form action="combat.php" method="POST">
            <div>
                <label for="pokemon1">Choisis ton pokémon :</label>
                <select name="pokemon1" id="pokemon1" class="border rounded p-2 w-full">
                    <?php foreach ($pokemons as $index => $pokemon): ?>
                        <option value="<?= $index; ?>"><?= $pokemon->getNom(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="pokemon2">Choisis ton adversaire :</label>
                <select name="pokemon2" id="pokemon2" class="border rounded p-2 w-full">
                    <?php foreach ($pokemons as $index => $pokemon): ?>
                        <option value="<?= $index; ?>"><?= $pokemon->getNom(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit">Combattre !</button>
        </form>
    </main>
</body>
</html>