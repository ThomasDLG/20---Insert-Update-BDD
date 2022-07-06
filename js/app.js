let userId = document.querySelectorAll("[data-id]");

let userListId = document.querySelectorAll("[data-user-id]");
let userListPrenom = document.querySelectorAll("[data-user-prenom]");
let userListNom = document.querySelectorAll("[data-user-nom]");
let userListEmail = document.querySelectorAll("[data-user-email]");

let inputId = document.getElementById("floatingId");
let inputPrenom = document.getElementById("floatingEditSurname");
let inputNom = document.getElementById("floatingEditName");
let inputEmail = document.getElementById("floatingEditEmail");

userId.forEach((button) => {
  button.addEventListener("click", function () {
    let id = button.attributes[5].nodeValue;
    inputId.value = id;
    let [inputResult] = Array.from(userListId).filter(
      (user) => user.attributes[0].nodeValue == id
    );
    inputPrenom.value = inputResult.attributes[1].nodeValue;
    inputNom.value = inputResult.attributes[2].nodeValue;
    inputEmail.value = inputResult.attributes[3].nodeValue;
  });
});
