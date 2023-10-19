<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#39887B" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="containerNavAccountCart">
    <?php echo custom_cart_content(); ?>
    <?php echo custom_account_link(); ?>
  </div>
  <!-- ---------------------------CLOUD---------------------------- -->
  <div class="containerCloud">
    <div class="cloudBackgroundHeader"></div>
  </div>
  <!-- ---------------------------LOGO---------------------------- -->
  <div class="containerHeader">
    <div class="containerLogo">
      <img src="<?php echo get_template_directory_uri(); ?>/img/LogoReveries.webp" alt="Description de votre image">
    </div>
    <!-- ---------------------------NAVIGATION-------------------- -->
    <nav class="containerMenu">
      <ul>
        <li class="cloud">
          <span><a href="http://localhost/wordpress/">ACCUEIL</a></span>
        </li>
        <li class="cloud2">
          <span><a href="http://localhost/wordpress/actualites/">ACTUALITE</a></span>
        </li>
        <li class="cloud">
          <span><a href="http://localhost/wordpress/boutique/">BOUTIQUE</a></span>
        </li>
        <li class="cloud2">
          <span><a href="http://localhost/wordpress/contact/">CONTACT</a></span>
        </li>
      </ul>
    </nav>

    <div class="containerBackgroundLeft"></div>
  </div>

  <?php wp_body_open(); ?>