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
</head>
<body>
    <main>
        <h2>Combat !</h2>
        <p><?= $combat->demarrerCombat(); ?></p>
        <a href="index.php">Retour à la selection des pokémons</a>
    </main>
</body>
</html>