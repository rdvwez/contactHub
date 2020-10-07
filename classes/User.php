<?php

class User 
{
    private $_id;
    private $_email;
    private $_password;

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
    public function setEmail($email){ $this->_email = $email; }
    public function setPassword($password) {  $this->_password = $password; }

    //getters
    public function getId()  { return $this->_id;  }
    public function getPassword()  { return $this->_password;  }
    public function getEmail()  { return $this->_email;  }

}

