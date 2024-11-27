<?php

require_once 'src/Pokemon/Pokemon.php';
require_once 'src/Pokemon/PokemonFeu.php';
require_once 'src/Pokemon/PokemonEau.php';
require_once 'src/Pokemon/PokemonPlante.php';
require_once 'src/classes/Attaque.php';
require_once 'src/classes/Combat.php';

$feuman = new PokemonFeu('FeuMan', 'Feu', 100, 20, 10);
$eauman = new PokemonEau('EauMan', 'Eau', 100, 15, 12);

$combat = new Combat($feuman, $eauman);
$combat->demarrerCombat();