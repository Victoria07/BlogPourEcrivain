<?php

require('Billet.php');
require('CommentaireModele.php');

class BilletModele{

    //Propriétés
    private $database;
    private $commentaireModele;

    //Constructeur
    function __construct(){
		$this->database = new Database();
		$this->commentaireModele = new CommentaireModele();
	}

    //Permet d'obtenir le billet par son identifiant
    public function obtenirBillet($id){
        $result = $this->database->query('SELECT * FROM billet WHERE id = '.$id);
        $commentaires = $this->commentaireModele->obtenirCommentaireParBillet($result['id']);
        $billet = new Billet($result['id'],$result['titre'],$result['billet'],$commentaires);
      }

    //Permet d'obtenir tous les billets
    public function obtenirTousLesBillets(){
        $array = array();
        $results = $this->database->query('SELECT * FROM billet ORDER BY id DESC');
        foreach($results as $result){
            $commentaires = $this->commentaireModele->obtenirCommentaireParBillet($result['id']);
            array_push($array, new Billet($result['id'],$result['titre'],$result['billet'],$commentaires));
        }
        return $array;
    }

    //Permet d'obtenir les n derniers billets
    public function obtenirDerniersBillets($n){
        $array = array();
        $results = $this->database->query('SELECT * FROM billet ORDER BY id DESC LIMIT 0, '.$n);
        foreach($results as $result){
            $commentaires = $this->commentaireModele->obtenirCommentaireParBillet($result['id']);
            array_push($array, new Billet($result['id'],$result['titre'],$result['billet'],$commentaires));
        }
        return $array;
    }

}

?>