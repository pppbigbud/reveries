function filterContent2(selector, actionName, dataKey, ajaxObjectName) {
  var categoryLinks = document.querySelectorAll(selector);

  categoryLinks.forEach(function (link) {
    link.addEventListener("click", async function (event) {
      event.preventDefault();

      var selectedCategory = link.getAttribute(dataKey);

      try {
        const response = await fetch(ajaxObjectName.ajaxurl, {
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
          console.log(ajaxObjectName.ajaxurl);
          console.log("Réponse AJAX reçue : " + responseData);
          console.log("Mise à jour du DOM effectuée.");
        } else {
          console.error("Erreur lors de la requête AJAX");
          console.log(ajaxObjectName.ajaxurl);
        }
      } catch (error) {
        console.error("Une erreur s'est produite : " + error);
        console.log(ajaxObjectName.ajaxurl);
      }
    });
  });
}

// Filtrer les articles
filterContent2(
  ".category-link-4articles",
  "filter_latest_articles",
  "data-category-4articles",
  ajax_object_4
);
