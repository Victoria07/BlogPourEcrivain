<?php 

class Utilisateur 
{
    // Propriétés
    protected $id;
    protected $pseudo; 
    protected $email;
    protected $motDePasse;
    protected $droits;
    protected $database;

    //Getters 
    public function getId() {return $this->id; }
    public function getPseudo() {return $this->pseudo;}
    public function getemail() {return $this->email;}
    public function getmotDePasse() {return $this->motDePasse}
    public function getdroits() {return $this->droits;}

    //Setters 
    public function setId ($id)
    {
        $this->id = $id; 
        sauvegarder();
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo; 
        sauvegarder(); 
    }


    public function setEmail($email)
    {
        $this->email = $email; 
        sauvegarder(); 
    }

    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse; 
        sauvegarder(); 
    }    

    public function setDroits($droits)
    {
        $this->droits = $droits; 
        sauvegarder(); 

    }

    // Costructeurs
    function _construct($id, $pseudo, $email, $motDePasse, $droits)
    {
        $this->id = $id;
        $this->pseudo = $pseudo; 
        $this->email = $email; 
        $this->motDePasse = $motDePasse; 
        $this->droits = $droits; 
        $database = new Database();
    }

    //Méthodes

    //permet de créer un objet en base de données
    function creer()
    {
        if(isset($id) || $id =! null)
            throw new Exeption ("L'utilisateur existe déjà !"); 
        $id = $database->create('INSERT INTO utilisateur (id, pseudo, email, motDePasse, droits") VALUES (NULL, "'.pseudo.'","'.email.'","'.motDePasse.'","'.droits);
    }

    //Permet de modifier un billet déjà éxistant en base de données
    function modifier()
    {
        if(!isset($id) || $id == null) 
            throw new Exception("L'utilisateur n'existe pas encore en base.");
        $database->query('UPDATE utilisateur SET pseudo = "'.pseudo.'" AND "'.email.'" AND "'.motDePasse.'" AND '.droits.' WHERE id = '.$id);
    }

    public function supprimer(){
        if(!isset($id) || $id==null)
            throw new Exception("Impossible de supprimer l'utilisateur car il n'existe pas.");
        $database->update('DELETE FROM utilisateur WHERE id = '.getId());
    }
}
?> 