<?php
    require('../Modeles/BilletModele.php');

    class BilletControlleur{
        
        private $BilletModele;

        function __construct(){
            $this->BilletModele = new BilletModele();
        }

        public function ObtenirLesBillets($pageCourante, $nbElementsParPage){
            return $this->BilletModele->obtenirLesBillets($pageCourante, $nbElementsParPage);
        }

        public function ObtenirNombrePages($nbElementsParPage){
            $nombreBillets = $this->BilletModele->compterBillets();
            $nombrePages = intval(intval($nombreBillets)/intval($nbElementsParPage));
            if($nombreBillets%$nbElementsParPage>0)
                $nombrePages+=1;
            return $nombrePages;
        }
    }
?> 
