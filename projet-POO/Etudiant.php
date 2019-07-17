    <?php
        class  Etudiant{
            private $matricule;
            private $nom_etudiant;
            private $prenom_etudiant;
            private $date_naiss;
            private $telephone;
            private $email;


            public function __construct($matricule="",$nom_etudiant="",$prenom_etudiant="",$date_naiss="",$telephone="",$email=""){
                $this->matricule=$matricule;
                $this->nom_etudiant=$nom_etudiant;
                $this->prenom_etudiant=$prenom_etudiant;
                $this->date_naiss=$date_naiss;
                $this->telephone=$telephone;
                $this->email=$email;
            }
            /**
             * Get the value of matricule
             */ 
            public function getMatricule()
            {
                        return $this->matricule;
            }
            /**
             * Set the value of matricule
             *
             * @return  self
             */ 
            public function setMatricule($matricule)
            {
                        $this->matricule = $matricule;

                        return $this;
            }
            /**
             * Get the value of nom_etudiant
             */ 
            public function getNom_etudiant()
            {
                        return $this->nom_etudiant;
            }
            /**
             * Set the value of nom_etudiant
             *
             * @return  self
             */ 
            public function setNom_etudiant($nom_etudiant)
            {
                        $this->nom_etudiant = $nom_etudiant;

                        return $this;
            }

            /**
             * Get the value of prenom_etudiant
             */ 
            public function getPrenom_etudiant()
            {
                        return $this->prenom_etudiant;
            }

            /**
             * Set the value of prenom_etudiant
             *
             * @return  self
             */ 
            public function setPrenom_etudiant($prenom_etudiant)
            {
                        $this->prenom_etudiant = $prenom_etudiant;

                        return $this;
            }

            /**
             * Get the value of date_naiss
             */ 
            public function getDate_naiss()
            {
                        return $this->date_naiss;
            }

            /**
             * Set the value of date_naiss
             *
             * @return  self
             */ 
            public function setDate_naiss($date_naiss)
            {
                        $this->date_naiss = $date_naiss;

                        return $this;
            }

            /**
             * Get the value of telephone
             */ 
            public function getTelephone()
            {
                        return $this->telephone;
            }

            /**
             * Set the value of telephone
             *
             * @return  self
             */ 
            public function setTelephone($telephone)
            {
                        $this->telephone = $telephone;

                        return $this;
            }

            /**
             * Get the value of email
             */ 
            public function getEmail()
            {
                        return $this->email;
            }

            /**
             * Set the value of email
             *
             * @return  self
             */ 
            public function setEmail($email)
            {
                        $this->email = $email;

                        return $this;
            }
        }
        


    ?>
