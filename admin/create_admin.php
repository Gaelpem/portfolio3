<?php
session_start(); 
require_once '../config/database.php'; 

//verification si l'administrateur est deja inscrit

if(isset($_SESSION['admin_nom'])){
    header(
        'location: index_admin.php'
    ); 
    exit; 
}

// verification

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['admin_nom'],$_POST['admin_email'], $_POST['admin_mdp'])){
      
        $admin_nom = htmlspecialchars(trim($_POST['admin_nom']));
        $admin_email = filter_var(trim($_POST['admin_email']), FILTER_VALIDATE_EMAIL);
        $admin_mdp = trim($_POST['admin_mdp']); 
        
        //hachage du mot de passe 

        $motPassHASH = password_hash($admin_mdp, PASSWORD_DEFAULT); 


        // verification si les champs sont remplies; 
        if(!empty($admin_nom) && !empty($admin_nom) && !empty($admin_email)){

          
            try{
           // verification des soumissions de l'admnitrateur si il bien soumis qlq chose de correcte avec une nouvelle instance
               $admin = new Admin([
                 
                "admin_nom" => $admin_nom ,
                "admin_email" => $admin_email ,
                "admin_mdp" => $motPassHASH ,

               ]); 

               // recuperation de donne de 
               // preparation de la requete
               $sql = "INSERT INTO admins(admin_nom, admin_email, admin_mdp) VALUES (:admin_nom, :admin_email, :admin_mdp)"; 
               //preparation de la requete $sql

               $stmt = $pdo->prepare($sql); 
               $stmt->execute([
    
                "admin_nom" => $admin_nom ,
                "admin_email" => $admin_email ,
                "admin_mdp" => $motPassHASH ,

               ]); 

               // stockage des donnees dans les session
               
               $_SESSION['admin_nom'] =  $admin_nom; 
               $_SESSION['admin_email'] =  $admin_email; 
               $_SESSION['admin_mdp'] = $motPassHash; 
               
               header(
                   'location: index_admin.php'
               ); 
               exit; 
            }catch(Exception $e){
                  echo 'Erreur de configuration' .$e->getMessage(); 
            }
     
        }


    }else{
        echo 'Vous devez remplir tous les champs'; 
    }

}else{
    echo 'Vous devez remplir tous les champs'; 
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="post">

     <h1> Création d'un administrateur </h1>

     <label for="">Nom</label>
     <input type="text" name="admin_nom">

     <label for="">Email</label>
     <input type="text" name="admin_email">

     <label for="">Mot de passe</label>
     <input type="text" name="admin_mdp">
      
    <button type="submit">Inscription</button>


    </form>
     
    
</body>
</html>