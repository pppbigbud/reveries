function isPasswordComplexEnough(password) {
  return (
      password.length >= 8 &&
      /[A-Z]/.test(password) &&
      /[a-z]/.test(password) &&
      /\d/.test(password)
  );
}

document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form[name='register']"); // Sélectionnez le formulaire par son nom
  var passwordInput = form.querySelector("input[name='password']"); // Sélectionnez l'input du mot de passe
  var submitButton = form.querySelector("input[type='submit']"); // Sélectionnez le bouton de soumission

  form.addEventListener("submit", function (event) {
      var password = passwordInput.value;

      if (!isPasswordComplexEnough(password)) {
          event.preventDefault(); // Empêche la soumission du formulaire
          alert("Le mot de passe ne respecte pas les critères de sécurité.");
      }
  });
});
