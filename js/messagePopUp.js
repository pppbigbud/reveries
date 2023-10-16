document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("myFormPasswordChange");
  var newPasswordInput = document.getElementById("new_password");
  var confirmPasswordInput = document.getElementById("confirm_password");
  var newPasswordError = document.getElementById("new-password-error");
  var confirmPasswordError = document.getElementById("confirm-password-error");

  newPasswordInput.addEventListener("input", function () {
    validatePassword(newPasswordInput.value, newPasswordError);
  });

  confirmPasswordInput.addEventListener("input", function () {
    validatePasswordConfirmation(newPasswordInput.value, confirmPasswordInput.value, confirmPasswordError);
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var new_password = newPasswordInput.value;
    var confirm_password = confirmPasswordInput.value;

    var password_valid = validatePassword(new_password, newPasswordError);
    var confirmation_valid = validatePasswordConfirmation(new_password, confirm_password, confirmPasswordError);

    if (password_valid && confirmation_valid) {
      showMessage(
        "C'est ok, votre mot de passe est modifié.",
        "message-container-valid"
      );
    }
  });

  function validatePassword(password, errorElement) {
    if (password === "") {
      errorElement.textContent = "";
      errorElement.style.display = "none";
      return true;
    }

    var isPasswordValid = isPasswordComplexEnough(password);
    updateErrorMessage(errorElement, isPasswordValid);
    return isPasswordValid;
  }

  function validatePasswordConfirmation(password, confirmation, errorElement) {
    if (confirmation === "") {
      errorElement.textContent = "";
      errorElement.style.display = "none";
      return true;
    }

    var passwordsMatch = doPasswordsMatch(password, confirmation);
    updateErrorMessage(errorElement, passwordsMatch);
    return passwordsMatch;
  }

  function isPasswordComplexEnough(password) {
    if (password.length < 8) {
      return false;
    } else if (!/[A-Z]/.test(password)) {
      return false;
    } else if (!/[a-z]/.test(password)) {
      return false;
    } else if (!/\d/.test(password)) {
      return false;
    }
    return true;
  }

  function doPasswordsMatch(password, confirmation) {
    return password === confirmation;
  }

  function updateErrorMessage(errorElement, isValid) {
    if (isValid) {
      errorElement.textContent = "";
      errorElement.style.display = "none";
    } else {
      errorElement.textContent = "Le mot de passe ne respecte pas les critères de sécurité.";
      errorElement.style.display = "block";
    }
  }

  function showMessage(message, containerId) {
    var messageContainer = document.getElementById(containerId);
    messageContainer.textContent = message;
    messageContainer.style.display = "block";

    setTimeout(function () {
      messageContainer.style.display = "none";
    }, 3000);
  }
});
