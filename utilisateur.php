<?php

class utilisateur
{
    private $id;
    private $nom;
    private $prenom;
    private $naissance;
    private $email;
    private $password;
    private $type;
    
    public function __construct($nom, $prenom, $naissance, $email, $password, $type)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->naissance = $naissance;
        $this->email = $email;
        $this->password = $password;
        $this ->type = $type;
    }
    
    public function getId() //getters (accesseurs) permettent de renvoyer la valeur
    {
        return $this->id;
    }
    
    public function setId($id) //setters(mutateurs) permettent de modifier une valeur
    {
        $this->id = $id;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getNaissance()
    {
        return $this->naissance;
    }

    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    }
  
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    
}
?>