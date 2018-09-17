<?php 

    require('Utilisateur.php');

    class UtilisateurModele { 
    
        //Propriétés
        private $database;

        //Constructeurs
        function __construct(){
            $database = new Database();
        }

        //Permet d'obtenir un utilisateur grâce à son identifiant
        public function obtenirUtilisateur($id){
            $result = $db->query('SELECT * FROM utilisateur WHERE id =' .$id);
            return new Utilisateur ($result["id"], $result["pseudo"], $result["email"], $result["motDePasse"],$result["droits"] );
        }

        public function verifierLogin($email, $motDePasse)
        {
            $mdp = hash("sha256", $motDePasse);
            $result = $database->query('SELECT * FROM uilisateur WHERE email = "'.$email.'"');
            if($mdp == $result["motDePasse"])
                return new Utilisateur ($result["id"], $result["pseudo"], $result["email"], $result["motDePasse"],$result["droits"] );
            else
                throw new Exception("Les informations de connexion sont incorrectes.");
        }
    }

?>
