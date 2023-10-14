document.addEventListener("DOMContentLoaded", function () {
  var categoryLinks = document.querySelectorAll(".category-link");

  categoryLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      var selectedCategory = link.getAttribute("data-category");

      var xhr = new XMLHttpRequest();
      xhr.open("POST", ajax_object.ajaxurl, true);
      xhr.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded; charset=UTF-8"
      );

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = xhr.responseText;
          var wrapperNews = document.querySelector(".wrapper-news");
          wrapperNews.innerHTML = response;
          console.log("Réponse AJAX reçue : " + response);
          console.log("Mise à jour du DOM effectuée.");
        }
      };

      var data = "action=filter_articles&category=" + selectedCategory;
      xhr.send(data);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var categoryLinks = document.querySelectorAll(".category-link-articles");

  categoryLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      var selectedCategory = link.getAttribute("data-category-articles");

      var xhr = new XMLHttpRequest();
      xhr.open("POST", ajax_object.ajaxurl, true);
      xhr.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded; charset=UTF-8"
      );

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = xhr.responseText;
          var wrapperNews = document.querySelector(".wrapper-news-articles");
          wrapperNews.innerHTML = response;
          console.log("Réponse AJAX reçue : " + response);
          console.log("Mise à jour du DOM effectuée.");
        }
      };

      var data = "action=filter_articles_page&category=" + selectedCategory;
      xhr.send(data);
    });
  });
});


