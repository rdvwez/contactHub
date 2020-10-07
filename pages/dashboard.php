<?php 
    // require_once('../function/function.php');
    // $manager = new contactManager(connexion()); 
    // $contacts = $manager->getList($_SESSION['id'])

     // foreach ($contacts as $contact){
                //   echo'
                // <tr>
                //   <th scope="row">'.$contact->getId().'</th>
                //   <td>'.$contact->getNom().'</td>
                //   <td>'.$contact->getPrenom().'</td>
                //   <td>'.$contact->getTelephone().'</td>
                //   <td>'.$contact->getEmail().'</td>
                //   <td>'.$contact->getCommentaire().'</td>
                //   <td>'.$contact->getCommentaire().'</td>
                // </tr>';} 
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">

    <title>contactHub</title>
    <!-- <link rel="canonical" href="https://icons.getbootstrap.com/icons/trash2/"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
<!-- <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->

    <!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico"> -->
<!-- <!-- <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml"> -->
<meta name="theme-color" content="#563d7c"> 


    <style>
      /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

       @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        } 
      } */
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="navbar-top-fixed.css" rel="stylesheet"> -->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Contact Hub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                     <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Deconnexion</button>
            </form>
        </div>
    </nav>
      
    <div  class="container space">
        <!-- <div class="jumbotron"> -->
            
        <!-- <div class="row " > <div class="col-sm"></div> </div> -->
        <!-- <hr> -->
      <div class="row" >
        <div class="col-sm-12 alignTextCenter "><h1 >Liste de contact</h1></div>
      </div>
      <div class="row">
        
        <div class="col-sm-2">
          <button class="btn  btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Ajouter un contact</button>
        </div>
        <div class="col-sm-10">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Télephone</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="content">
              
            </tbody>
          </table>
        </div>
          <!-- <div class="col-sm-2"> </div> -->

      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="addForm" action="../classes/traitement.php" method="post">
       
                <span class="alert alert-danger form-control error " hidden>Email ou Mot de passe incorect</span>
                <div class="form-group">
                  <label for="nom" class="sr-only">Nom:</label>
                  <input type="nom" id="nom" class="form-control" name ="nom" placeholder="Nom" required autofocus>
                </div>
                <div class="form-group">
                  <label for="prenom" class="sr-only">Prenom:</label>
                  <input type="prenom" id="prenom" class="form-control" name="prenom" placeholder="Prenom" >
                </div>
                <div class="form-group">
                  <label for="telephone" class="sr-only">Telephone:</label>
                  <input type="telephone" id="telephone" class="form-control" name="telephone" placeholder="Telephone" required>
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" id="email" class="form-control" name ="email" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                  <label for="commentaire" class="sr-only">Commentaire</label>
                  <textarea name="commentaire" id="commentaire" class="form-control"  autofocus cols="10" rows="5"></textarea>
                </div>
                <input type="text"  value="1" name="taff" hidden>
                <button class="btn btn-lg btn-primary btn-block" id="button" type="submit">enregistrer</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
        </div>
      </div>
    
    </div>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../assets/js/script2.js"></script>

<!-- <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script> -->
<!-- <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script> -->
<script>

  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>
  </body>
</html>
