<?php

    class Commentaire
    {
        //Propriétés
        protected $id;
        protected $utilisateur;
        protected $billet;
        protected $commentaire;
        protected $database;

        //Getters
        public function getId(){ return $this->id; }
        public function getUtilisateur(){ return $this->utilisateur; }
        public function getBillet(){ return $this->billet; }
        public function getCommentaire(){ return $this->commentaire; }

        //Setters
        public function setId($id)
        {
            $this->id = $id;
            sauvegarder();
        }
        public function setUtilisateur($utilisateur)
        {
            $this->utilisateur = $utilisateur;
            $this->sauvegarder();
        }
        public function setBillet($billet)
        {
            $this->billet = $billet;
            $this->sauvegarder();
        }
        public function setCommentaire($commentaire)
        {
            $this->commentaire = $commentaire;
            $this->sauvegarder();
        }

        //Constructeurs
        function __construct($id, $utilisateur, $billet, $commentaire)
        {
            $this->id = $id;
            $this->utilisateur = $utilisateur;
            $this->billet = $billet;
            $this->commentaire = $commentaire;
            $this->database = new Database();
        }

        public function creer()
        {
            if(isset($this->id) || $this->id!=null)
                throw new Exception("Le commentaire existe déjà");
            $this->id=$this->database->create('INSERT INTO commentaire (id, idUtilisateur, idBillet, commentaire) VALUES (NULL, "'.getUtilisateur().'", "'.getBillet().'", "'.getCommentaire().'");');
        }

        private function sauvegarder()
        {
            if(!isset($this->id) || $this->id==null)
                throw new Exception("Impossible de modifier le commentaire car il n'existe pas.");
                $this->database->update('UPDATE commentaire SET idUtilisateur = "'.getUtilisateur().'" AND idBillet = "'.getBillet().'" AND commentaire = "'.getCommentaire().'";');
        }

        public function supprimer(){
            if(!isset($this->id) || $this->id==null)
                throw new Exception("Impossible de supprimer le commentaire car il n'existe pas.");
            $this->database->update('DELETE FROM commentaire WHERE id = '.getId());
        }
    }
?>