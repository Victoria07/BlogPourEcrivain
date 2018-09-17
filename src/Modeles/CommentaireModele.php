<?php 

require('Commentaire.php');

class CommentaireModele{

    //Propriétés
    private $database;

    //Constructeurs
    function __construct(){
		$this->database = new Database();
	}

    //Permet d'obtenir le commentaire par son identifiant
    public function obtenirCommentaire($id){
        $result = $this->database->query('SELECT * FROM commentaire WHERE id = '.$id);
        return new Commentaire($result['id'],$result['utilisateur'],$result['billet'],$result['commentaire']);
    }

    //Permet d'obtenir les commentaires d'un billet
    public function obtenirCommentaireParBillet($id)
    {
        $array = array();
        $results = $this->database->query('SELECT * FROM commentaire WHERE idBillet = '.$id.' ORDER BY id');
        foreach($results as $result)
            array_push($array, new Commentaire($result['id'],$result['utilisateur'],$result['billet'],$result['commentaire']));
        return $array;
    }

    //Permet d'obtenir les n derniers commentaires d'un billet
    public function obtenirDerniersCommentaireParBillet($id, $n)
    {
        $array = array();
        $results = $this->database->query('SELECT * FROM commentaire WHERE idBillet = '.$id.' ORDER BY id LIMIT 0, '.$n);
        foreach($results as $result)
            array_push($array, new Commentaire($result['id'],$result['utilisateur'],$result['billet'],$result['commentaire']));
        return $array;
    }
}

?>
