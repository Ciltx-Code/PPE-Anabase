<?php
Class Modele_congressiste{
	private $conn;
	
	public function __construct(){
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}

    public function getAllCongressiste(){
        $req = $this->conn->prepare ("select NUM_CONGRESSISTE, NOM_ORGANISME, NOM_HOTEL, NOM_CONGRESSISTE, PRENOM_CONGRESSISTE, ADRESSE_CONGRESSISTE, TEL_CONGRESSISTE, DATE_INSCRIPTION from congressiste c join hotel h ON h.NUM_HOTEL = c.NUM_HOTEL JOIN organisme_payeur o ON c.NUM_ORGANISME = o.NUM_ORGANISME ORDER BY NOM_CONGRESSISTE");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllHotels(){
        $req = $this->conn->prepare ("select NOM_HOTEL from hotel");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function getAllOrganismes(){
        $req = $this->conn->prepare ("select NOM_ORGANISME from organisme_payeur");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function getNumCongressiste(){
        $req = $this->conn->prepare ("select NUM_CONGRESSISTE from congressiste");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function  getCongressisteById($id){
        $req = $this->conn->prepare ("select NOM_CONGRESSISTE,PRENOM_CONGRESSISTE,ADRESSE_CONGRESSISTE,TEL_CONGRESSISTE from congressiste where NUM_CONGRESSISTE = ".$id);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNomCongressisteById($id){
        $req = $this->conn->prepare ("select NOM_CONGRESSISTE from congressiste");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getHotelNameById($id){
        $req = $this->conn->prepare("Select NOM_HOTEL from hotel where NUM_HOTEL = ?");
        $req->execute(array($id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrganismNameById($id){
        $req = $this->conn->prepare("Select NOM_ORGANISME from organisme_payeur where NUM_ORGANISME = ?");
        $req->bindValue(1,$id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function déguillemetiseurReguillemetiseur($string){
        $string = str_replace("'", "\'", $string);
        return $string;
    }

    public function getHotelIdByName($nom) {
        $reqHotelById = $this->conn->prepare("select NUM_HOTEL from hotel where NOM_HOTEL = ?");
        $reqHotelById->bindValue(1,$nom);
        $reqHotelById->execute();
        return $reqHotelById->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrganismeIdByName($id) {
        $reqOrganismeById = $this->conn->prepare("select NUM_ORGANISME from organisme_payeur where NOM_ORGANISME = ?");
        $reqOrganismeById->bindValue(1,$id);
        $reqOrganismeById->execute();
        return $reqOrganismeById->fetch(PDO::FETCH_ASSOC);
    }

    public function sendMail($nom,$prenom,$adresse,$tel,$mail,$date,$hotel,$organisme){
        $hotelName = $this->getHotelNameById($hotel);
        $organismeName = $this->getOrganismNameById($organisme);
        $sujet = "Nouveau congréssiste ajouté !";
        $corp = "Vous avez bien ajouté un congréssiste !\nVoici ses informations : \n \nNom : ".$nom."\nPrénom : ".$prenom."\nAdresse : ".$adresse."\nNuméro de telephone : ".$tel."\nDate de création : ".$date."\nHotel : ".$hotelName["NOM_HOTEL"]."\nOrganisme : ".$organismeName["NOM_ORGANISME"]."";
        $headers = "From: anabase87@gmail.com";
        if (mail($mail, $sujet, $corp, $headers)) {

        } else {
            echo "Échec de l'envoi de l'email...";
        }
    }


    public function addCongressiste($nom,$prenom,$adresse,$tel,$mail,$date,$hotel,$organisme){
        $req = $this->conn->prepare("insert into congressiste (NUM_CONGRESSISTE,NUM_ORGANISME,NUM_HOTEL,NOM_CONGRESSISTE,PRENOM_CONGRESSISTE,ADRESSE_CONGRESSISTE,TEL_CONGRESSISTE,DATE_INSCRIPTION,CODE_ACCOMPAGNATEUR) values(NULL,?,?,?,?,?,?,?,NULL)");
        $req->execute(array($organisme,$hotel,$nom,$prenom,$adresse,$tel,$date));
        $this->sendMail($nom,$prenom,$adresse,$tel,$mail,$date,$hotel,$organisme);
    }

    public function getAllHotelName(){
        $req = $this->conn->prepare ("select NUM_HOTEL,NOM_HOTEL from HOTEL");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllOrganismeName(){
        $req = $this->conn->prepare ("select NUM_ORGANISME,NOM_ORGANISME from organisme_payeur");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteCongressisteById($id){
        $req = $this->conn->prepare ("DELETE from congressiste WHERE NUM_CONGRESSISTE =?");
        $req->execute(array($id));
    }

    public function updateCongressisteById($id,$nom,$prenom,$adresse,$tel,$date,$hotel,$organisme){
        $req = $this->conn->prepare("UPDATE congressiste SET NUM_ORGANISME=?, NUM_HOTEL=?, NOM_CONGRESSISTE=?, PRENOM_CONGRESSISTE=?, ADRESSE_CONGRESSISTE=?, TEL_CONGRESSISTE=?, DATE_INSCRIPTION=? WHERE NUM_CONGRESSISTE=?");
        $req->bindValue(1, $organisme);
        $req->bindValue(2, $hotel);
        $req->bindValue(3, $nom);
        $req->bindValue(4, $prenom);
        $req->bindValue(5, $adresse);
        $req->bindValue(6, $tel);
        $req->bindValue(7, $date);
        $req->bindValue(8, $id);
        $req->execute();
    }

}

?>