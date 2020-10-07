<?php

class Contact 
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_telephone;
    private $_email;
    private $_commentaire;
    private $_idu;

    public function __construct(array $donnees){ $this->hydrate($donnees); } //ppele les getters pour initialiser les variables  

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
    // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
        
    // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
      // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    //setters
    public function setId($id){ $this->_id = (int) $id; } 
    public function setNom($nom) {  $this->_nom = $nom; }
    public function setPrenom($prenom) {  $this->_prenom = $prenom; }
    public function setTelephone($telephone) {  $this->_telephone = $telephone; }
    public function setEmail($email){ $this->_email = $email; }
    public function setCommentaire($commentaire) {  $this->_commentaire = $commentaire; }
    public function setIdu($idu) {  $this->_idu = (int) $idu; }

    //getters
    public function getId()  { return $this->_id;  }
    public function getNom()  { return $this->_nom;  }
    public function getPrenom()  { return $this->_prenom;  }
    public function getTelephone()  { return $this->_telephone;  }
    public function getEmail()  { return $this->_email;  }
    public function getCommentaire()  { return $this->_commentaire;  }
    public function getIdu()  { return $this->_idu;  }

}

