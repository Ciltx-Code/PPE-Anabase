<?php
include ("./modele/modele.congressiste.php");
Class Controleur_liste{
    // --- champs de base du controleur
    public $vue=""; //vue appelée par le controleur

    public $message = "";
    public $erreur = "";

    public $data; // le tableau des données de la vue

    public $modele; // nom du modele

    public $m; // objet modele

    public $post; // renseigné par index

    public function __construct(){
        // déclarer la vue
        $this->vue = "liste";
        $this->modele = new modele_congressiste();
    }

    public function todo_initialiser(){
        $this->reset();
        $this->data["liste"] = $this->modele->getAllCongressiste();
        $this->hotel["liste"] = $this->modele->getAllHotelName();
        $this->organisme["liste"] = $this->modele->getAllOrganismeName();
    }

    public function todo_supprimer(){
        $this->modele->deleteCongressisteById($this->post["idCongressiste"]);
        $this->todo_initialiser();
    }

    public function todo_enregistrer(){
        $this->modele->updateCongressisteById($this->post['idCongressiste'],$this->post['nomcongressiste'],$this->post['prenomcongressiste'],$this->post['adrcongressiste'],$this->post['telcongressiste'],$this->post['date'],$this->post['hotel'],$this->post['organisme']);
        echo "<script>console.log('test')</script>";
        $this->todo_initialiser();
    }


    public function todo_ajouter(){
        $continuer=true;
        if ($this->post["nomCongressisteAjout"] == "" ){
            $this->erreur = "Vous devez saisir un nom ! ";
            $continuer=false;
        }
        if ($this->post["prenomCongressisteAjout"] == "" ){
            $this->erreur = "Vous devez saisir un prénom ! ";
            $continuer=false;
        }
        if ($this->post["adrcongressisteAjout"] == "" ){
            $this->erreur = "Vous devez saisir une adresse ! ";
            $continuer=false;
        }
        if ($this->post["telcongressisteAjout"] == "" ){
            $this->erreur = "Vous devez saisir un numéro de téléphone ! ";
            $continuer=false;
        }
        if ($this->post["dateAjout"] == "" ){
            $this->erreur = "Vous devez saisir une date d'ajout";
            $continuer=false;
        }
        if ($this->post["organismeAjout"] == "" ){
            $this->erreur = "Vous devez saisir une date d'ajout";
            $continuer=false;
        }
        if ($this->post["hotelAjout"] == "" ){
            $this->erreur = "Vous devez saisir une date d'ajout";
            $continuer=false;
        }
        if($continuer){
            $this->modele->addCongressiste($this->post["nomCongressisteAjout"],$this->post["prenomCongressisteAjout"],$this->post["adrcongressisteAjout"],$this->post["telcongressisteAjout"] ,$this->post["dateAjout"],$this->post["hotelAjout"] ,$this->post["organismeAjout"]  );
            $this->message = $this->post["nomCongressisteAjout"]." ".$this->post["prenomCongressisteAjout"]." a été enregistré";
            $this->reset();
        }

        $this->todo_initialiser();
    }

    public function reset()
    {
        $this->post["nomCongressisteAjout"] = "";
        $this->post["prenomCongressisteAjout"] = "";
        $this->post["adrcongressisteAjout"] = "";
        $this->post["telcongressisteAjout"] = "";
        $this->post["dateAjout"] = "";
        $this->post["hotelAjout"] = "";
        $this->post["organismeAjout"] = "";
    }

}
?>