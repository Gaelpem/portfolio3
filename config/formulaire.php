<?php
class Formulaire{
    const ERROR_NOM = 'Nom incorrect'; 
    const ERROR_EMAIL = 'Email incorrect'; 
    const ERROR_MESSAGE = 'Message doit entre compris entre 2 à 300 caractère'; 

    private string $nom = ""; 
    private string $email = ""; 
    private string $message = ""; 

    public function __construct(array $data){
        if(!empty($data["user_nom"]) && !empty($data["user_email"]) &&  !empty($data["user_message"]) ){
            $this->setNom($data["user_nom"]); 
            $this->setEmail($data["user_email"]);
            $this->setMessage($data["user_message"]); 
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
     
    public function setMessage( string $message) : void 
    {
              if(iconv_strlen($message) >=  2 && iconv_strlen($message) <= 300){
                  $this->message = $message; 
              }else{
                throw new Exception(self::ERROR_MESSAGE); 
              }
    }




    public function getNom():string
    {
        return $this->nom ; 
    }

    public function getEmail():string
    {
        return $this->email; 
    }


    public function getMessage():string
    {
        return $this->message; 
    }
}


?>