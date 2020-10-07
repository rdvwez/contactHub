<?php

function chargerClasse($classe){ require '../classes/'. $classe . '.php'; } // On inclut la classe correspondante au paramètre passé.
   
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

function connexion(){ return  new PDO('mysql:host=localhost;dbname=contact', 'root', 'josue8@desir');} //connexion à la base de données
