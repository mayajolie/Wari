<?php
class Etudiant_Boursier extends Etudiant{  
    private $id_type;
    public function __construct($matricule="",$nom_etudiant="",$prenom_etudiant="",$date_naiss="",$telephone,$email="",$id_type)
    {
       parent:: __construct($matricule,$nom_etudiant,$prenom_etudiant,$date_naiss,$telephone,$email);
        $this->id_type=$id_type;
        
    }
    

    /**
     * Get the value of id_type
     */ 
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * Set the value of id_type
     *
     * @return  self
     */ 
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        return $this;
    }
}
?>