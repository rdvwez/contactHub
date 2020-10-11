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
            
            // print_r($donnees);
         } //donnée verigiée, l'utilisateur existe 
        else {
            session_destroy();
            $_SESSION = array();
             echo 'failure'; } // utilisateur non reconnu
        //  var_dump($user);
        
    break;

    case 2:
        $contactManager = new contactManager(connexion()); //instenciation du manager 
        $contacts = $contactManager->getList( $_SESSION['id']); //instenciation du manager 
        // print_r($contacts);
        foreach ($contacts as $contact){
              echo'
            <tr>
              <th scope="row">'.$contact->getId().'</th>
              <td>'.$contact->getNom().'</td>
              <td>'.$contact->getPrenom().'</td>
              <td>'.$contact->getTelephone().'</td>
              <td>'.$contact->getEmail().'</td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-danger" id="supprimer" titlt="supprimer le contact"><i class="fa fa fa-trash"></i></button>
                    <button type="button" class="btn btn-info"id="consulter" titlt="consulter les details du contact"><i class="fa fa-eye"></i></button>
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
    
    default:
        echo"aucune option de traitement pour cette opérarion";
    break;
}

