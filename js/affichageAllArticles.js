document.addEventListener("DOMContentLoaded", function () {
  const allCategoriesArticles = document.querySelector(".all-categories-articles");
  const categoryLinks = document.querySelectorAll(".category-link-articles");

  categoryLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      const selectedCategory = link.getAttribute("data-category-articles");

      // Masquer la div d'articles de toutes les catégories
      allCategoriesArticles.classList.add("hidden");
 
      const previousCategoryDiv = document.querySelector(".selected-category-articles");
      if (previousCategoryDiv) {
          previousCategoryDiv.classList.add("hidden");
      }
      const selectedCategoryDiv = document.querySelector(".selected-category-articles");
      selectedCategoryDiv.innerHTML = "Affichez ici les articles de la catégorie sélectionnée";
      selectedCategoryDiv.classList.remove("hidden");
    });
  });
});
