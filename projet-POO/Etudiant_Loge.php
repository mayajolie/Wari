<?php
class Etudiant_Loge extends Etudiant_Boursier{
    private $id_chambre;
    public function __construct($matricule,$nom_etudiant="",$prenom_etudiant="",$date_naiss="",$telephone,$email="",$id_type,$id_chambre)
    {
       parent:: __construct($matricule,$nom_etudiant,$prenom_etudiant,$date_naiss,$telephone,$email,$id_type);
       
        $this->id_chambre=$id_chambre;
    }
    /**
     * Get the value of id_chambre
     */ 
    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    /**
     * Set the value of id_chambre
     *
     * @return  self
     */ 
    public function setId_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;

        return $this;
    }
}
    

?>