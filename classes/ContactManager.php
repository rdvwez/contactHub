<?php
class ContactManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Contact $contact)
  {
    $q = $this->_db->query("SELECT count(*) as nombre FROM contact WHERE telephone =".$contact->getTelephone());
    $nombre = $q->fetch(PDO::FETCH_ASSOC);
    // print_r($q->fetch(PDO::FETCH_ASSOC)) ;
    if ($nombre['nombre'] == 0) {
      $q = $this->_db->prepare("INSERT INTO contact(nom,prenom,telephone,email,idu,commentaire) 
      VALUES(:nom,:prenom,:telephone,:email,:idu,:commentaire)");
      // $q->bindValue(':id', $contact->getId());
      $q->bindValue(':nom', $contact->getNom());
      $q->bindValue(':prenom', $contact->getPrenom());
      $q->bindValue(':telephone', $contact->getTelephone());
      $q->bindValue(':email', $contact->getEmail());
      $q->bindValue(':idu', $contact->getIdu());
      $q->bindValue(':commentaire', $contact->getCommentaire());
      $q->execute();
    } 
    
   
  }

  public function delete(Contact $contact)
  {
    // $this->_db->exec('DELETE FROM contact WHERE id = '.$contact->getId());
     $this->_db->exec('UPDATE contact SET state = 1 WHERE id ='.$contact->getId());
  }

  public function get($id)
  {
    $id = (int) $id;
    $q = $this->_db->query("SELECT * FROM contact WHERE id = $id AND state= 0");
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Contact($donnees);
  }

  public function getList(int $idu)
  {
    $contacts = [];
    $q = $this->_db->query("SELECT * FROM contact WHERE idu = $idu AND state= 0 ORDER BY id ASC");
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $contacts[] = new Contact($donnees);
    }
    return $contacts;
  }



  public function List($idu)
  {
    $contacts = [];
    $q = $this->_db->query('SELECT * FROM contact WHERE idu ='.$idu);
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $contacts[] = new Contact($donnees);
    }
    return $contacts;
  }

  public function update(Contact $contact)
  {
    $q = $this->_db->prepare('UPDATE contact SET nom = :nom,prenom = :prenom,telephone = :telephone,
                                email = :email,commentaire = :commentaire WHERE id = :id AND idu = :idu');
    $q->bindValue(':nom', $contact->getNom());
    $q->bindValue(':prenom', $contact->getPrenom());
    $q->bindValue(':telephone', $contact->getTelephone());
    $q->bindValue(':email', $contact->getEmail());
    $q->bindValue(':idu', $contact->getIdu());
    $q->bindValue(':id', $contact->getId());
    $q->bindValue(':commentaire', $contact->getCommentaire());
    $q->execute();
    // print_r($contact);
  }

  public function setDb(PDO $db) { $this->_db = $db;}
}