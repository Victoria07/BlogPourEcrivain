<?php 

    class Billet 
    {
        //Propriétés
        protected $id;
        protected $titre;
        protected $billet;
        protected $commentaires;
        protected $database;

        //Getters
        public function getId(){ return $this->id; }
        public function getTitre(){ return $this->titre; }
        public function getBillet(){ return $this->billet; }
        public function getCommentaires(){ return $this->commentaires; }

        //Setters
        public function setId($id)
        {
             $this->id = $id;
             $this->sauvegarder(); 
        }

        public function setTitre($id)
        {
             $this->titre = $titre;
             $this->sauvegarder();
        }

        public function setBillet($billet)
        {
             $this->billet = $billet; 
             $this->sauvegarder();
        }

        public function setCommentaires($commentaires)
        {
            $this->commentaires = $commentaires;
        }

        //Constructeurs
        function __construct($id, $titre, $billet, $commentaires)
        {
            $this->id = $id;
            $this->titre = $titre;
            $this->billet = $billet;
            $this->commentaire = $commentaires;
            $this->database = new Database();
        }

        public function creer()
        {
            if(isset($this->id) || $this->id!=null)
                throw new Exception("Le billet existe déjà");
            $this->id=$this->database->create('INSERT INTO billet (id, titre, billet) VALUES (NULL, "'.getTitre().'", "'.getBillet().'");');
        }

        private function sauvegarder()
        {
            if(!isset($this->id) || $this->id==null)
                throw new Exception("Impossible de modifier le billet car il n'existe pas.");
            $database->update('UPDATE billet SET titre = "'.getTitre().'" AND billet = "'.getBillet().'";');
        }

        public function supprimer(){
            if(!isset($this->id) || $this->id==null)
                throw new Exception("Impossible de supprimer le billet car il n'existe pas.");
            $this->database->update('DELETE FROM billet WHERE id = '.getId());
        }

        public function ajouterCommentaire($commentaire){
            if(!isset($this->commentaires))
                $commentaires = array();
            array_push($this->commentaires, $commentaire);
        }

        public function supprimerCommentaire($id){
            if(!isset($this->commentaires))
                throw new Exception("Impossible de supprimer le commentaire car il n'existe pas.");
            foreach(getCommentaires() as $commentaire)
                if($commentaire.getId()==$id)
                {
                    $commentaire.supprimer();
                    unset($commentaire);  
                }
        }
    }
?>
