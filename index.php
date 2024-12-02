<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/Pokemon/PokemonElectrique.php';
require_once 'src/Classes/Combat.php';
require_once 'src/Classes/Attaque.php';
require_once 'pokemons.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/css/style.css">
</head>
<body>
    <main>
        <header>
            <img src="style/img/Logo.png" alt="">
            <img src="style/img/Pokeball.png" alt="">
        </header>
        <form action="combat.php" method="POST">
        <div class="selector">
            <div class="details">
                <label for="pokemon1"><img src="style/img/select1.png" alt=""></label>
                <div class="choice">
                    <select name="pokemon1" id="pokemon1">
                        <?php foreach ($pokemons as $index => $pokemon): ?>
                            <option value="<?= $index; ?>"><?= $pokemon->getNom(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="details">
                <label for="pokemon2"> <img src="style/img/select2.png" alt=""></label>
                    <div class="choice">
                        <select name="pokemon2" id="pokemon2">
                            <?php foreach ($pokemons as $index => $pokemon): ?>
                                <option value="<?= $index; ?>"><?= $pokemon->getNom(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
        </div>

            <button type="submit" class="animated-button">Combattre<img src="style/img/Pokeball.png" alt=""></button>

        </form>
    </main>

    <script src="style/js/script.js"></script>

</body>
</html>