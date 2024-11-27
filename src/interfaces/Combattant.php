<?php

interface Combattant {   //On crée une interface Combattant pour l'aeller dans le fichier Pokemon.php
    public function seBattre(Pokemon $adversaire): void;  //Fonction qui permet de se battre avec un adversaire
    public function utiliserAttaqueSpeciale(Pokemon $adversaire): void;      //Pas sur (a tester)
}