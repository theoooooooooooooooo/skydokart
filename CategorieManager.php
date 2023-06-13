<?php

class CategorieManager
{
	//Declaration des attributs de la classe
	private $_id;				
	private $_nom;


	

	//Declaration du constructeur
	public function __construct($idCategorie, $nomCategorie) 							
	{
		$this->_id = $idCategorie;
		$this->_nom = $nomCategorie;
	}
	

	
	//Declaration de la methode publique 'create' qui permet d'ajouter une nouvelle Categorie a la BD
	public function create()
	{
		require_once "bddConn.php";
		$conn->exec("SET NAMES utf8");
		$sql = "INSERT INTO Categorie (nom) 
			VALUES ('".$this->_nom."');"; 	
			// echo $sql;
		$conn->exec($sql) or die(print_r($conn->errorInfo(), true));
	}


	public function update()
		{
			require_once "../bddConn.php";
			$conn->exec("SET NAMES utf8");
			$sql = "UPDATE Categorie  
					SET  nom = '".$this->_nom."'
					WHERE id = '".$this->_id."';";
				//echo $sql;
			$conn->exec($sql) or die(print_r($conn->errorInfo(), true));
		}

	public function delete()
		{
			require "../bddConn.php";
			$conn->exec("SET NAMES utf8");
			$sql = "DELETE FROM Categorie WHERE id = '".$this->_id."'; ";
			// echo $sql;
			$conn->exec($sql) or die(print_r($conn->errorInfo(), true));
		}




	//Utilisation methode "getter"
	public function get_Id()
		{
			return $this->_id;
		}
	public function  get_Nom()
		{
			return $this->_nom;
		}
	public function  get_AdresseRue()
		{
			return $this->_adresseRue;
		}
	public function  get_CodePostal()
		{
			return $this->_codePostal;
		}
	public function  get_Ville()
		{
			return $this->_ville;
		}
	public function  get_President()
		{
			return $this->_president;
		}
	public function  get_NumTelephone()
		{
			return $this->_numTelephone;
		}
	public function  get_Mail()
		{
			return $this->_mail;
		}
	public function  get_SiteWeb()
		{
			return $this->_siteWeb;
		}
}
?>