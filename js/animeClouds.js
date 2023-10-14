document.addEventListener("DOMContentLoaded", function () {
  // Créez une timeline pour exécuter les animations en séquence
  var timeline = anime.timeline();

  // Animation pour cloud
  var cloudAnimation = {
    targets: ".cloud",
    translateY: [
      { value: "-50vh", duration: 0 },
      { value: "7vh", duration: 1000, easing: "easeInOutQuad" },
      { value: "6.5vh", duration: 1000, easing: "easeInOutQuad" },
    ],
    complete: function (anim) {
      anime({
        targets: ".cloud",
        translateY: "7vh",
        duration: 1500,
        easing: "easeInOutQuad",
        direction: "alternate",
        loop: true,
      });
    },
  };

  // Animation pour cloud2 (sans délai)
  var cloud2Animation = {
    targets: ".cloud2",
    translateY: [
      { value: "-55vh", duration: 0 },
      { value: "10vh", duration: 1250, easing: "easeInOutQuad" },
      { value: "9.5vh", duration: 1250, easing: "easeInOutQuad" },
    ],
    complete: function (anim) {
      anime({
        targets: ".cloud2",
        translateY: "10vh",
        duration: 1500,
        easing: "easeInOutQuad",
        direction: "alternate",
        loop: true,
      });
    },
  };

  // Animation pour .cloudBackgroundHeader (déplacement vers la droite)
  var cloudBackgroundAnimationRight = {
    targets: ".cloudBackgroundHeader",
    translateX: [
      { value: "-5%", duration: 0 }, // Position initiale en dehors de la page à gauche
      { value: "5%", duration: 24000, easing: "linear" }, // Position cible à droite (3 fois plus lent)
    ],
    scale: [
      { value: 1, duration: 0 }, // Échelle initiale
      { value: 1.05, duration: 12000 }, // Échelle agrandie (3 fois plus lent)
    ],
  };

  // Animation pour .cloudBackgroundHeader (retour vers la gauche)
  var cloudBackgroundAnimationLeft = {
    targets: ".cloudBackgroundHeader",
    translateX: [
      { value: "5%", duration: 0 }, // Position initiale à droite
      { value: "-5%", duration: 24000, easing: "linear" }, // Position cible à gauche (3 fois plus lent)
    ],
    scale: [
      { value: 1.05, duration: 12000 }, // Échelle agrandie (3 fois plus lent)
      { value: 1, duration: 12000 }, // Retour à l'échelle initiale (3 fois plus lent)
    ],
    loop: true,
  };

  // Ajoutez les deux animations à la timeline pour qu'elles se suivent
  timeline.add(cloudBackgroundAnimationRight, 0);
  timeline.add(cloudBackgroundAnimationLeft, "+=4");
  timeline.add(cloudAnimation, 0);
  timeline.add(cloud2Animation, 0);
});
