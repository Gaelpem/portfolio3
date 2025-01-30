<?php
class Utlisateur{
    const ERROR_NOM = 'Nom incorrect'; 
    const ERROR_EMAIL = 'Email incorrect'; 

    private string $nom = ""; 
    private string $email = ""; 

    public function __construct(array $data){
        if(!empty($data["user_nom"]) && !empty($data["user_email"])){
            $this->setNom($data["user_nom"]); 
            $this->setEmail($data["user_email"]); 
        }else{
            throw new Exception("Vous devez remplir tous les champs"); 
        }
    }

    public function setNom( string $nom) : void 
    {
               if(ctype_lower($nom[0])){
                $this->nom = $nom; 
               }else{
                 throw new Exception(self::ERROR_NOM); 
               }
    }
    
    public function setEmail(string $email) : void
    {
        if (ctype_lower($email[0])) {
            $premiereLettreMin = true; // verification si la 1re lettre est en miniscule
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email ; 
        }else{
            throw new Exception(self::ERROR_EMAIL); 
        }
    }

    public function getNom($nom):string{
        return $this->nom ; 
    }

    public function getEmail($email):string{
        return $this->email; 
    }
}


?>