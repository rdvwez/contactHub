<?php 
session_start();
require_once('../function/function.php');
extract($_POST);

//test de cas por detecter l'operation à effectuer
switch ($taff) {
    case 1:
        $user = new User($_POST);  //instenciation de de l'user
        $manager = new UserManager(connexion()); //instenciation du manager
        // $donnee = $manager->connexion($user);

        if ($manager->connexion($user)) {
            session_start();
            $donnees = $manager->connexion($user);
            $_SESSION['id'] =  $donnees['id'];
            echo 'success';
            // header('Location: ../pages/dashboard.php');
         } //donnée verigiée, l'utilisateur existe 
        else {
            session_unset();
            session_destroy();
             echo 'failure'; } // utilisateur non reconnu
        
    break;

    case 2:
        $contactManager = new contactManager(connexion()); //instenciation du manager 
        $contacts = $contactManager->getList( $_SESSION['id']); //ecuperation de la liste des contacte d 'un user à l'iade de son id
        // print_r($contacts);
        foreach ($contacts as $contact){
              echo'
            <tr id="'.$contact->getId().'">
              <th scope="row">'.$contact->getId().'</th>
              <td>'.$contact->getNom().'</td>
              <td>'.$contact->getPrenom().'</td>
              <td>'.$contact->getTelephone().'</td>
              <td>'.$contact->getEmail().'</td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-danger" id="suppression" titlt="supprimer le contact" onclick="onContactDelete('.$contact->getId().')" ><i class="fa fa fa-trash"></i></button>
                    <button type="button" class="btn btn-info"  onclick="onContactUpdate('.$contact->getId().') " ><i class="fa fa-eye"></i></button>
                </div>
              </td>
            </tr>';}
        // var_dump($_SESSION['id']);
        // echo $_SESSION['id'] ;
    break;

    case 3:
            // echo'triament de l\'ajout';
            $_POST['idu'] =  $_SESSION['id'];
            $contact = new Contact($_POST);  //instenciation de de l'user
            $contactManager = new contactManager(connexion()); //instenciation du manager 
            $contactManager->add($contact); //instenciation du manager 
            // print_r($_POST);

    break;

    case 4:
       
        $contact = new Contact($_POST);  //instenciation de de l'user
        $contactManager = new contactManager(connexion()); //instenciation du manager 
        $contactManager->delete($contact); //instenciation du manager 
        // print_r($_POST);

    break;

    case 5:
       
        // $contact = new Contact($_POST);  //instenciation de de l'user
        $contactManager = new contactManager(connexion()); //instenciation du manager 
        $contact = $contactManager->get($_POST['id']); //instenciation du manager 
        // foreach ($contacts as $contact){
            echo'
       <div class="form-group">
         <label for="nom" class="sr-only">Nom:</label>
           <input type="nom" id="nom1" class="form-control" name ="nom" placeholder="Nom" value="'.$contact->getNom().'"required autofocus>
       </div>
       <div class="form-group">
         <label for="prenom" class="sr-only">Prenom:</label>
         <input type="prenom" id="prenom1" class="form-control" value="'.$contact->getPrenom().'" name="prenom" placeholder="Prenom" >
       </div>
       <div class="form-group">
         <label for="telephone" class="sr-only">Telephone:</label>
         <input type="telephone" id="telephone1" class="form-control" name="telephone" value="'.$contact->getTelephone().'"placeholder="Telephone" required>
       </div>
       <div class="form-group">
         <label for="email" class="sr-only">Email:</label>
         <input type="email" id="email1" class="form-control" name ="email" value="'.$contact->getEmail().'"placeholder="Email" required autofocus>
       </div>
       <div class="form-group">
         <label for="commentaire" class="sr-only">Commentaire:</label>
         <textarea name="commentaire" id="commentaire1" class="form-control" value="'.$contact->getCommentaire().'" autofocus cols="10" rows="5"></textarea>
       </div>
       <input type="text"  value="6" name="taff" hidden>
       <input type="text"  value="'.$contact->getId().'" name="id" hidden>
       <button class="btn btn-sm btn-primary btn-block" id="button1" type="submit">enregistrer</button>
       <button type="reset" class="btn btn-sm btn-warning btn-block">vider le formulaire</button>
     ';
        

    break;

    case 6:
       
        $_POST['idu'] =  $_SESSION['id'];
        $contact = new Contact($_POST);  //instenciation de de l'user
        $contactManager = new contactManager(connexion()); //instenciation du manager 
        $contactManager->update($contact); //instenciation du manager 
        // print_r($_POST);

    break;

    case 7: //ka deconnexion
        session_unset();
        session_destroy(); 
        // print_r($_SESSION);

    break;
    
    default:
        echo"Aucune option de traitement pour cette opérarion";
    break;
}

