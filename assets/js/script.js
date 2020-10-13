class App {
    constructor() {
    //   console.log('app')
      this.hasResult = false
      this.dom = {
        error: document.querySelector('.error'),
        email: document.querySelector('#email'),
        password: document.querySelector('#password'),
        // result: document.querySelector('.result'),
        form: document.querySelector('.connexionForm'),
        addForm: document.querySelector('.addForm'),
        content: document.querySelector('#content')
      }
      
    //   console.log(this.dom.error)
    // if ( (typeof this.dom.form != 'undefined') || this.dom.form != null ) { this.addListeners() }
    // if ((typeof this.dom.addForm != 'undefined') || this.dom.addForm != null ) { this.addFormListeners() }
    // if ((typeof this.dom.tbody != 'undefined') || this.dom.tbody != null ) { this.loadListeners() }

    // this.addFormListeners()
    // this.loadListeners()
    this.addListeners()

    }
  
    //On ecoute la soummission du formulaire de connesxion
    // loadListeners() { this.dom.tbody.addEventListener('load', this.onLoadPage)}

    //On ecoute la soummission du formulaire de connesxion
    addListeners() { 
      this.dom.form.addEventListener('submit', this.onSubmit)
    }

    //On ecoute la soummission du formulaire d'ajout de contact
    // addFormListeners() {  this.dom.addForm.addEventListener('submit', this.onAddFormSubmit) }
    
    //au chargement de la page dashboard
    onLoadPage() {
      // window.addEventListener('load', (event) => {
      //   console.log('page is fully loaded');
      // });
     // alert('AZERTYU')
      $.post("../classes/traitement.php", {taff: 2} , function(jsonData, status){
        // alert("Data: " + data + "\nStatus: " + status);
        // let data = JSON.stringify(jsonData);
        // $("div#res").append(data);
        console.log(jsonData)
        this.dom.content.html(jsonData)
        // console.log(jsonData)
        // console.log(JSON.stringify(jsonData).nom)
        // console.log(this.dom.tbody)

      });

      
    }
    
    
    //focntion appeleé pendant la soumission du formulaire de connexion
    onSubmit = (e) => {
      e.preventDefault()   
    // let donnees = {email:this.dom.email.value,password:this.dom.password.value}
      let method = this.dom.form.method
      let action = this.dom.form.action
      let error = this.dom.error
      
      $(function() {
        $.ajax({
        
          type : method,
          url : action,
          data: $("form").serialize(),
          dataType : 'text', // On désire recevoir du texte
          success : function(donneeRecuperee, statut){ // code_html contient le HTML renvoyé si le fonction reussi
            // console.log(statut) //ce staturt est à success si la requete à reussi
            // console.log(donneeRecuperee)  //la donnee retournée par la fonction callback
              if (donneeRecuperee == 'failure') {
                // console.log(donneeRecuperee)
                // alert('success')
                error.removeAttribute("hidden")
                setTimeout(function(){ error.className +="animate__animated animate__headShake"; },1);
              } else {
                error.setAttribute("hidden","hidden")
                // console.log(donneeRecuperee)
                // alert('echec')
                window.location = "./pages/dashboard.php";
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
    //  
    }
  
 //focntion appeleé pendant la soumission du formulaire d'ajout du contact
 onAddFormSubmit = (e) => {
  e.preventDefault()   
  // let donnees = {email:this.dom.email.value,password:this.dom.password.value}
  let method = this.dom.form.method
  let action = this.dom.form.action
  let error = this.dom.error
  
  $(function() {
    $.ajax({
      type : method,
      url : action,
      data: $("form").serialize(),
      dataType : 'html', // On désire recevoir des donneés en format json
      success : function(donneeRecuperee, statut){ // code_html contient le HTML renvoyé si le fonction reussi
        // console.log(statut) //ce staturt est à success si la requete à reussi
        // console.log(donneeRecuperee)  //la donnee retournée par la fonction callback
          if (donneeRecuperee == 'failure') {
            console.log(donneeRecuperee)
            error.removeAttribute("hidden")
            setTimeout(function(){ error.className +="animate__animated animate__headShake"; },1);
          } else {
            error.setAttribute("hidden","hidden")
            // console.log(donneeRecuperee)
            window.location = "./pages/dashboard.php";
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
//  
}
    
  }
  
  
  new App()