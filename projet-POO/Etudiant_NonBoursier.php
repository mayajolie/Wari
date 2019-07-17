<?php
class Etudiant_NonBoursier extends Etudiant{
    private $adresse;

    public function __construct($matricule="",$nom_etudiant="",$prenom_etudiant="",$date_naiss="",$telephone="",$email="",$adresse=""){
        parent:: __construct($matricule,$nom_etudiant,$prenom_etudiant,$date_naiss,$telephone,$email);
        $this->adresse=$adresse;
    }
    

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
}
?>