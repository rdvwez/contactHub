class App {
    constructor() {
    //   console.log('app')
      this.hasResult = false
      this.dom = {
        error: document.querySelector('.error'),
        confirmation: document.querySelector('#confirmation'),
        // email: document.querySelector('#email'),
        // password: document.querySelector('#password'),
        // result: document.querySelector('.result'),
        // form: document.querySelector('.connexionForm'),
        addForm: document.querySelector('.addForm'),
        content: document.querySelector('.content')
      }
     

    this.addFormListeners()
    this.loadListener()

    }
  
    // console.log('le chargement a reussi')
    //On ecoute le chargement de la page
    loadListener() { window.addEventListener('load', this.onPageLoad() )}
    // addFormListeners() { this.dom.addForm.addEventListener('submit', this.onAddFormSubmit() )}
    addFormListeners() { this.dom.addForm.addEventListener('submit', this.onAddFormSubmit )}

    
    //au chargement de la page dashboard
    onPageLoad() {
      $.post("../classes/traitement.php", {taff: 2} , function(data, status){
        $("tbody").html(data);
        // console.log(data)
       });
     }

    
  
 //focntion appeleé pendant la soumission du formulaire d'ajout du contact
 onAddFormSubmit = (e) => {
  e.preventDefault()   
  // let donnees = {email:this.dom.email.value,password:this.dom.password.value}
  let method = this.dom.addForm.method
  let action = this.dom.addForm.action
  let error = this.dom.error

  $(function() {
    $.ajax({
      type : method,
      url : action,
      data: $("form").serialize(),
      dataType : 'text', // On désire recevoir des donneés en format json
      success : function(donneeDeRetour, statut){ // code_html contient le HTML renvoyé si le fonction reussi
        console.log( donneeDeRetour) //ce staturt est à success si la requete à reussi


        $("#confirmation").fadeIn( 500, () => { 
          setTimeout(() => { $("#confirmation").fadeOut(500) },1500);
          
          // console.log('12345'); 
         });
         

        // $("#confirmation").show( 500, () => { 
        //   setTimeout(() => { $("#confirmation").hide(500) },1500);
          
        //   // console.log('12345'); 
        //  });
         
        // setTimeout(() => { $("#confirmation").addClass( "animate__animated animate__fadeIn" ) },1);
        // confirmation.removeAttribute("hidden")
        // utilisationde jquery pour la classe fadout
        // setTimeout(() => { $("#confirmation").addClass( "animate__animated animate__fadeOut" ) },1500);// utilisationde jquery pour la classe fadout
        // setTimeout(() => { confirmation.setAttribute("hidden", "hidden") },1800);// utilisationde jquery pour la classe fadout
        // confirmation.setAttribute("hidden", "hidden")
        // setTimeout(function(){ error.className +="animate__animated animate__headShake"; },1);
          // if (donneeDeRetour == 'failure') {
          //   console.log(donneeRecuperee)
          //   // error.removeAttribute("hidden")
          //   // setTimeout(function(){ error.className +="animate__animated animate__headShake"; },1);
          // } else {
          //   // error.setAttribute("hidden","hidden")
          //   // console.log(donneeRecuperee)
          //   // window.location = "./pages/dashboard.php";
          // }
        },
      error : function(resultat, statut, erreur){ // la requete a echoué 
        console.log(statut)
        console.log(resultat)
        console.log(erreur)
        // console.log
      }
    })
    
  })
  setTimeout(() => { this.onPageLoad();  },2510);
  // await 
  
  
  
//  
  }
   
}
  
new App()