<?php
class UserManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function connexion(User $user)
  {
    // echo $user->getEmail();
    $q = $this->_db->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
    $q->bindValue(':email', $user->getEmail());
    $q->bindValue(':password', $user->getPassword());
    $q->execute();
    $donnee = $q->fetch(PDO::FETCH_ASSOC);

    // print_r($donnee) ;
    return $donnee;
  }

  public function add(User $user)
  {
    $q = $this->_db->prepare('INSERT INTO users(email,password) VALUES(:email, :password)');
    $q->bindValue(':email', $user->getEmail());
    $q->bindValue(':password', $user->getPassword());
    $q->execute();
  }


  public function delete(User $user)
  {
    $this->_db->exec('DELETE FROM user WHERE id = '.$user->getId());
  }

  public function get($id)
  {
    $id = (int) $id;
    $q = $this->_db->query('SELECT email, password FROM user WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  }

  public function getList()
  {
    $users = [];
    $q = $this->_db->query('SELECT email, password FROM user ORDER BY email');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new User($donnees);
    }
    return $users;
  }

  public function update(User $user)
  {
    $q = $this->_db->prepare('UPDATE user SET email = :email, password = :password WHERE id = :id');
    $q->bindValue(':email', $user->getEmail());
    $q->bindValue(':password', $user->getPassword());
    $q->execute();
  }

  public function setDb(PDO $db) { $this->_db = $db;}
}