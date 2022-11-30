<?php
//  connexion avec la base de donnée
    $bdd = new mysqli("localhost", "root", "root", "gestion_eleve");
     if(!$bdd){
        echo "Vous n'êtes pas connecté à la base de donnée";
     }
?>