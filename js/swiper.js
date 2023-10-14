document.addEventListener("DOMContentLoaded", function () {
  var mySwiperMain = new Swiper(".swiper-container", {
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
    },
  });

  var mySwiperArticles = new Swiper(".swiper-container-articles-single", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next-article-single",
      prevEl: ".swiper-button-prev-article-single",
    },
    autoplay: {
      delay: 4000,
    },
  });

  // Pour recharger les bullets si la taille de l'écran change en largeur
  window.addEventListener("resize", function () {
    mySwiperMain.update();
    mySwiperArticles.update();
  });
});
