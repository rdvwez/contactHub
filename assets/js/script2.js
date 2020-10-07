class App {
    constructor() {
    //   console.log('app')
      this.hasResult = false
      this.dom = {
        error: document.querySelector('.error'),
        // email: document.querySelector('#email'),
        // password: document.querySelector('#password'),
        // result: document.querySelector('.result'),
        // form: document.querySelector('.connexionForm'),
        addForm: document.querySelector('.addForm'),
        content: document.querySelector('.content')
      }
      
    

    // this.addFormListeners()
    this.loadListener()

    }
  
    //On ecoute le chargement de la page
    loadListener() { window.addEventListener('load', this.onPageLoad() )}

    

    //On ecoute la soummission du formulaire d'ajout de contact
    // addFormListeners() {  this.dom.addForm.addEventListener('submit', this.onAddFormSubmit) }
    
    //au chargement de la page dashboard
    onPageLoad() {
      $.post("../classes/traitement.php", {taff: 2} , function(data, status){
        $("tbody").append(data);
        // console.log(data)
       });
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
            console.log(donneeRecuperee)
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
    
    // async getWeatherByCity(city) {
    //   const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=31e6e989590a80e12446183d2fc1d332&units=metric`
  
    //   let response = await fetch(url)
    //   let json = await response.json()
  
    //   if (json.cod === '404') {
    //     this.dom.error.classList.remove('none')
    //     this.dom.result.classList.add('hidden')
    //     return
    //   }
      
    //   this.setDataToHTML(json)
    //   // api.openweathermap.org/data/2.5/weather?q={city name}&appid=31e6e989590a80e12446183d2fc1d332
    // }
  
    // setDataToHTML(json) {
    //   this.dom.error.classList.add('none')
    //   const cityEl = this.dom.result.querySelector('h2')
    //   const currentTempEl = this.dom.result.querySelector('.temperature__current')
    //   const maxTempEl = this.dom.result.querySelector('.temperature__max')
    //   const minTempEl = this.dom.result.querySelector('.temperature__min')
  
    //   cityEl.innerHTML = json.name
    //   currentTempEl.innerHTML = `Température <strong>${json.main.temp}°</strong>`
    //   maxTempEl.innerHTML = `Max <strong>${json.main.temp_max}°</strong>`
    //   minTempEl.innerHTML = `Min <strong>${json.main.temp_min}°</strong>`
  
    //   if (!this.hasResult) {
    //     gsap.to(this.dom.result, {
    //       autoAlpha: 1
    //     })
    //     this.hasResult = true
    //   }
  
    //   gsap.from([cityEl,currentTempEl,minTempEl, maxTempEl], {
    //     y: 40,
    //     autoAlpha: 0,
    //     stagger: 0.05,
    //     ease: Expo.easeOut
    //   })
   // }
    
  }
  
  
  new App()