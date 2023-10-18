// document.addEventListener("DOMContentLoaded", function() {
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "/wp-admin/admin-ajax.php", true);
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
  
//   // Gérez la réponse de la requête
//   xhr.onreadystatechange = function() {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//           var response = JSON.parse(xhr.responseText);
//           var cartCount = response.cart_count;
          
//           // Utilisez cartCount comme vous le souhaitez dans votre JavaScript
//           console.log("Nombre d'articles dans le panier : " + cartCount);
//       }
//   };
  
//   // Envoyez la demande AJAX
//   xhr.send("action=get_cart_contents_count");
// });