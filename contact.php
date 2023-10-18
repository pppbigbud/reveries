<?php
/*

  Template Name: Contact Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

<div class="news-separtor-news news-divider-separator-news">

  <div class="containerTitreContactPage">
    <h1 class="titreContactPage">Contact</h1>
  </div>

  <div class="containerFormContactPage">

    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <input type="hidden" name="action" value="custom_contact_form">

      <!-- <label for="favoriteOnly">
      <p class="txtForm">Quel est l'objet de votre email:</p>
    </label>
    <select name="favoriteOnly" id="favoriteOnly">
      <option value="Elagage">Question sur mes produits</option>
      <option value="Abattage">Sur</option>
      <option value="Bois de chauffage">Bois de chauffage</option>
      <option value="Autre">Autre</option>
    </select> -->

      <label for="name">
        <p class="txtForm">Nom :</p>
      </label>
      <input type="text" name="name" class="inputContact" required>

      <label for="email">
        <p class="txtForm">Email :</p>
      </label>
      <input type="email" name="email" class="inputContact" required>

      <label for="message">
        <p class="txtForm" class="inputContact">Message :</p>
      </label>
      <textarea name="message" required></textarea>

      <input type="submit" class="btnFormContact" value="Envoyer ✉️">
    </form>
  </div>

</div>

<?php get_footer(); ?>