document.addEventListener("DOMContentLoaded", function() {
  var galleryImages = document.querySelectorAll(".gallery-image");
  var mainProductImage = document.getElementById("main-product-image");

  galleryImages.forEach(function(image) {
      image.addEventListener("click", function() {
          var largeImageURL = this.getAttribute("data-large-image");
          mainProductImage.src = largeImageURL;
          console.log(largeImageURL);
      });
  });
});