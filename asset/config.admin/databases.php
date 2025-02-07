<?php

                const DB_HOST = "localhost"; 
                const DB_NAME = "portfolio"; 
                const DB_USER = "root"; 
                const DB_PASS = "root"; 


    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ,DB_USER, DB_PASS ); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        echo 'Connexion reussie ! '; 
    }catch(Exception $e){
        die("Connexion à la base de donnée échouée " . $e->getMessage()); 
    }

    
?>