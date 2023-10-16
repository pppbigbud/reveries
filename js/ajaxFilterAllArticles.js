function filterContent1(selector, actionName, dataKey) {
  var categoryLinks = document.querySelectorAll(selector);

  categoryLinks.forEach(function (link) {
    link.addEventListener("click", async function (event) {
      event.preventDefault();

      var selectedCategory = link.getAttribute(dataKey);

      try {
        const response = await fetch(ajax_object.ajaxurl, {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
          },
          body: new URLSearchParams({
            action: actionName,
            category: selectedCategory,
          }),
        });

        if (response.ok) {
          const responseData = await response.text();
          var wrapperNews = document.querySelector(".wrapper-news-articles");
          wrapperNews.innerHTML = responseData;
          console.log(ajax_object.ajaxurl);
          console.log("Réponse AJAX reçue : " + responseData);
          console.log("Mise à jour du DOM effectuée.");
        } else {
          console.error("Erreur lors de la requête AJAX");
        }
      } catch (error) {
        console.error("Une erreur s'est produite : " + error);
      }
    });
  });
}

// Filtrer les articles
filterContent1(
  ".category-link-articles",
  "filter_articles_page",
  "data-category-articles"
);
