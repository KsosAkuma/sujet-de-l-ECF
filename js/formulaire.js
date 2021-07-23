// Ce fichier est la version "vanilla" du script de vérification d'email, des champs et de l'affichage si le mail est bien envoyé
//
// let validMailSend = document.getElementById("btnSpace").lastElementChild;
// let textarea = document.getElementsByTagName("textarea")[0];
// let email = document.querySelector("#email").value;
// let confirmation = document.querySelector("#confirmation").value;
// if (verifChamp()) {
//   document.querySelector("form").addEventListener("submit", function (event) {
//     event.preventDefault();
//     console.log(verifChamp());
//     console.log(email);
//     console.log(confirmation);
//     fetch("php/formulaire.php", {
//       method: "POST",
//       body: new FormData(document.querySelector("form")),
//     })
//       .then(
//         function (response) {
//           console.log(response);
//           return response.json();
//         }
//       )
//       .then(function (data) {
//         return data;
//       });
//     return (fin = true);
//   });
// }
// function verifChamp() {
//   if (email != confirmation || textarea.value.length == 0) {
//     validMailSend.style.color = "red";
//     validMailSend.textContent = "Veuillez vérifier les champs obligatoire";
//     setTimeout(() => {
//       validMailSend.textContent = "";
//     }, 5000);
//     return false;
//   } else if (email == confirmation && textarea.value.length > 1) {
//     validMailSend.textContent = "email envoyé";
//     validMailSend.style.color = "green";
//     setTimeout(() => {
//       validMailSend.textContent = "";
//     }, 5000);
//     return true;
//   }
// }
