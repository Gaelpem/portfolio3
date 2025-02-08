<?php
function getPDO() {
    // On récupère les identifiants depuis config.php
    $config = require 'config.php';

    try {
        // Connexion avec encodage UTF-8 pour éviter les problèmes de caractères spéciaux
        $pdo = new PDO(
            "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'] . ";charset=utf8", 
            $config['user'], 
            $config['pass']
        );

        // Activer le mode d'affichage des erreurs SQL
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo; // On retourne l'objet PDO pour l'utiliser ailleurs
    } catch (Exception $e) {
        die("Connexion à la base de données impossible : " . $e->getMessage());
    }
}

// Exemple d'utilisation
$pdo = getPDO();
