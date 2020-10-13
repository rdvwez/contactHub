class App {
    constructor() {
    //   console.log('app')
      this.hasResult = false
      this.dom = {
        error: document.querySelector('.error'),
        confirmation: document.querySelector('#confirmation'),
        suppression: document.querySelector('#suppression'),
        addForm: document.querySelector('.addForm'),
        upDateForm: document.querySelector('.upDateForm'),
        content: document.querySelector('.content'),
        deconnexion: document.querySelector('#deconnexion')
      }
     
    this.addFormListeners()
    this.loadListener()
    this.upDateFormListener()
    this.DeconnexionListener()
    }

    //On ecoute le chargement de la page
    loadListener() { window.addEventListener('load', this.onPageLoad() )}

    // Ecoute du formumlaire d'ajout
    addFormListeners() { this.dom.addForm.addEventListener('submit', this.onAddFormSubmit )}

     // Ecoute du formumlaire de mise à jour
    upDateFormListener() { this.dom.upDateForm.addEventListener('submit', this.onUpDateFormSubmit )}

     // Ecoute du formumlaire du bouton de deconnexion
    DeconnexionListener() { this.dom.deconnexion.addEventListener('click', this.onDeconnexionButtonPush )}

    
    //fonction appeleé au chargement de la page dashboard
    onPageLoad() {
      $.post("../classes/traitement.php", {taff: 2} , function(data, status){
        $("tbody").html(data);
        // console.log(data)
       });
     }

     //fonction appelée au clique du bouton deconnexion
    onDeconnexionButtonPush() {
      $.post("../classes/traitement.php", {taff: 7} , function(data, status){
        window.location = "../index.html";
        // $("tbody").html(data);
        console.log(data)
       });
      //  console.log('ca marche')
    }


 //focntion appeleé pendant la soumission du formulaire d'ajout du contact
  onAddFormSubmit = (e) => {
    e.preventDefault()   
    // let donnees = {email:this.dom.email.value,password:this.dom.password.value}
    let method = this.dom.addForm.method
    let action = this.dom.addForm.action
    let error = this.dom.error
    $(() => {
      $.ajax({
        type : method,
        url : action,
        data: $("form").serialize(),
        dataType : 'text', // On désire recevoir des donneés en format json
        success : function(donneeDeRetour, statut){ // code_html contient le HTML renvoyé si le fonction reussi
          // console.log( statut) //ce staturt est à success si la requete à reussi
          // console.log( donneeDeRetour) //ce staturt est à success si la requete à reussi
          if (!donneeDeRetour =='') {
            $("#confirmation").fadeIn( 500, () => { 
              setTimeout(() => { $("#confirmation").fadeOut(500) },1500);
            });
          } else {
            $(".error").fadeIn( 500, () => { 
              setTimeout(() => { $(".error").fadeOut(500) },1500);
            });
          }
        },
        error : function(resultat, statut, erreur){ // la requete a echoué 
        console.log(statut)
        console.log(resultat)
        console.log(erreur)
        // console.log
        }
      })   
    })
    setTimeout(() => { this.onPageLoad();},2510);
  }

  // focntion appeleé pendant la soumission du formulaire de mmise à jour
  onUpDateFormSubmit = (e) => {
    e.preventDefault()   
    let method = this.dom.upDateForm.method
    let action = this.dom.upDateForm.action
    let error = this.dom.error
    $(() => {
      $.ajax({
        type : method,
        url : action,
        data: $("#upDateForm").serialize(),
        dataType : 'text', // On désire recevoir des donneés en format json
        success : function(donneeDeRetour, statut){ // code_html contient le HTML renvoyé si le fonction reussi
          
            $("#updateConfirmation").fadeIn( 500, () => { 
              setTimeout(() => { $("#updateConfirmation").fadeOut(500) },1500);
            });
            setTimeout(() => { $("#upDatation").fadeOut( 500 ) },2500);
        },
        error : function(resultat, statut, erreur){ // la requete a echoué 
        console.log(statut)
        console.log(resultat)
        console.log(erreur)
        // console.log
        }
      })   
    })
    setTimeout(() => { this.onPageLoad();},1000);
  }

  
   
}
  
new App()

// fonction appellé pour supprimer un contact
onContactDelete = (id) =>{
  // let reponse = prompt("voumlez vous supprimer ce contact ?");
  if ( confirm("voumlez vous supprimer ce contact ?")) {
    $.post("../classes/traitement.php", {taff: 4,id:id} , function(data, status){
      $("tr[id="+id+"]").addClass( "animate__animated animate__fadeOutTopLeft" );
      setTimeout(() => { 
        $.post("../classes/traitement.php", {taff: 2} , function(data, status){
          $("tbody").fadeIn(4000, () => {  $("tbody").html(data) } );
         });
      },500);
    });
  }
}

// fonction appellé pour la mise à jour d'un contact
onContactUpdate = (id) =>{
  $.post("../classes/traitement.php", {taff: 5,id:id} , function(data, status){
    $("#upDateForm").html(data);
    $("#upDatation").fadeIn( 500);
   });
  
}