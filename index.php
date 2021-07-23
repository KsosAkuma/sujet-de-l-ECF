<!-- 
                    Modalités pédagogiques
Critères de performance :

Le code passe au validateur W3C HTML
~~NO mais les erreurs html sont liée uniquement au attribut de Vue.js donc je pense que c'est OK~~
Le code passe au validateur W3C CSS 
~~OK~~
Les champs HTML sont typés
~~OK~~
L'email et sa confirmation sont validés en JS
~~OK~~
Le formulaire est envoyé en ajax et la réponse est chargé sur la même page
~~OK~~
Les champs sont validés coté serveur
~~OK~~
De jolies couleurs sur ton formulaire pour valider/invalider les champs saisis
~~OK~~
Le formulaire est reponsive (mobile et desktop)
~~OK~~ mais pas tablette (hors consigne )
Bonus : Ajoutez un CAPTCHA pour filter les messages envoyés des bots.
~~NOOOOOO~~
Bonus PERSONEL : Incorporer les bases de Vue.JS au projet
~~OK~~
 -->
<!-- <?PHP require "php/recaptcha.php"; ?> -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sujet de l'ECF</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
</head>

<body>
  <div id="reactiv">
    <h1>Nous Contacter</h1>
    <div class="frame" id="btnSpace" v-show="modal == false">
      <button class="btn" @click="togglee()">Nous Contacter</button>
      <p>{{ responseMail }}</p>
    </div>

    <div id="formulaire" v-show="modal">
      <form id="demo-form" action="php/formulaire.php" method="post" class="frame" @submit.prevent="verifForm">
        <h3>Formulaire de contact à remplir:</h3>
        <input class="btn" type="text" name="nom" id="nom" placeholder="Votre nom" maxlength="10" minlength="3" v-model="nom" />
        <input class="btn" type="text" name="prenom" id="prenom" placeholder="Votre prénom" maxlength="10" minlength="3" v-model="prenom" />
        <input class="btn" id="email" type="email" name="email" placeholder="Entrez votre adresse mail" v-model="email" required />
        <input class="btn" id="confirmation" type="email" name="confirmation" placeholder="Confirmez votre adresse mail" v-model="confirmation" required />
        <select class="btn" name="sujet" id="sujet" v-model="sujet">
          <option value="">Choix du sujet</option>
          <option value="service">service</option>
          <option value="reclamation">reclamation</option>
          <option value="don">don</option>
          <option value="partenaire">partenaire</option>
          <option value="autre">autre</option>
        </select>
        <textarea class="btn" name="message" id="message" cols="30" rows="10" placeholder="message" maxlength="750" v-model="message" required></textarea>
        <!-- <span>
          <input type="checkbox" name="bot" id="bot" class="g-recaptcha" data-sitekey="<?PHP ?>" data-callback='onSubmit' data-action='submit'>
          <label for="bot"> Je ne suis pas un robot </label>
          echo SITE_TUTO_EXEMPLE *****
        </span> -->
        <input class="btn" type="submit" name="submit" value="Envoyez" />
      </form>
      <p>{{ responseMail }}</p>
    </div>
    <div id="resumer" class="frame" v-show="modal">
      <h2>Aperçu</h2>
      <h3>{{nom}} {{prenom}}</h3>
      <h4>Sujet : {{sujet}}</h4>
      <p>{{message}}</p>
      <p>De: {{ email }}</p>
    </div>
  </div>
  <!-- <script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
  </script> -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
    var app = new Vue({
      el: "#reactiv",
      data: {
        nom: "",
        prenom: "",
        email: "",
        sujet: "",
        message: "",
        confirmation: "",
        modal: false,
        responseMail: "",
      },
      methods: {
        togglee() {
          return (this.modal = this.modal ? false : true);
        },
        verifForm() {
          if (this.email == this.confirmation && this.message != "") {
            this.responseMail = "email envoyé";
            setTimeout(() => {
              this.responseMail = "";
            }, 5000);

            this.togglee();
            fetch("php/formulaire.php", {
                method: "POST",
                body: new FormData(document.querySelector("form")),
              })
              // on envoie les données du formulaire à notre script PHP en utilisant la technologie AJAX
              // pour ça on utilise la méthode JS fetch()
              .then(
                // on récupère la réponse du serveur en JSON et on la transforme en objet Javascript
                function(response) {
                  console.log(response);
                  return response.json(); // retourne un objet javascript
                }
              )
              .then(function(data) {
                console.log(data);
                return data;
              });
          } else {
            this.responseMail = "Veuillez vérifier les champs obligatoire";
            setTimeout(() => {
              this.responseMail = "";
            }, 5000);
          }
        },
      },
    });
  </script>
</body>

</html>