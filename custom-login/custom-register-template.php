<?php
/*
 * Template Name: Page d'Inscription
 * Template Post Type: page
 */

get_header();
// echo custom_cart_content();
// echo custom_account_link();

// if (isset($_POST['register-submit'])) {
//     $username = sanitize_user($_POST['username']);
//     $email = sanitize_email($_POST['email']);
//     $password = esc_attr($_POST['password']);

//     $user_id = wp_create_user($username, $password, $email);

//     if (is_wp_error($user_id)) {
//         echo 'Erreur lors de l\'inscription : ' . $user_id->get_error_message();
//     } else {
//         // Récupérer la sortie mise en mémoire tampon
//         // ob_start();
//         // Ajoutez le rôle de client WooCommerce à l'utilisateur
//         $user = new WP_User($user_id);
//         $user->set_role('customer');

//         // L'utilisateur est inscrit avec succès, connectez-le et effectuez la redirection JavaScript.
//         $user = get_user_by('ID', $user_id);
//         wp_set_current_user($user_id, $user->user_login);
//         wp_set_auth_cookie($user_id);

//         // $output = ob_get_clean();
//         echo '<script>location.replace("' . home_url() . '");</script>';
//         exit; // Arrêtez l'exécution du script.
//     }
// }

// Ne mettez pas de code générant une sortie ici, assurez-vous que tout affichage vient après cette section.

// Afficher le formulaire d'inscription
?>
<h1>HORS SERVICE</h1>
<!-- <form method="post">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" required>
    <label for="email">Adresse e-mail</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" name="register-submit" value="S'inscrire">
</form> -->


<?php

get_footer();
?>

//FORMULAIRE D INSCRIPTION validation et enregistrement des champs personnalisés

    // Fonction pour ajouter les champs personnalisés au formulaire d'inscription
// function custom_register_fields() {
//     ?>
//     <p>
//         <label for="first_name">Prénom</label>
//         <input type="text" name="first_name" id="first_name" class="input" value="<?php if (isset($_POST['first_name'])) echo esc_attr($_POST['first_name']); ?>" required>
//     </p>
//     <p>
//         <label for="last_name">Nom</label>
//         <input type="text" name "last_name" id="last_name" class="input" value="<?php if (isset($_POST['last_name'])) echo esc_attr($_POST['last_name']); ?>" required>
//     </p>
//     <?php
// }
// add_action('register_form', 'custom_register_fields');

    // Fonction pour valider les champs personnalisés lors de l'inscription
// function custom_registration_errors($errors, $sanitized_user_login, $user_email) {
//     if (empty($_POST['first_name'])) {
//         $errors->add('first_name_error', 'Le prénom est requis.');
//     }
//     if (empty($_POST['last_name'])) {
//         $errors->add('last_name_error', 'Le nom est requis.');
//     }
//     return $errors;
// }
// add_filter('registration_errors', 'custom_registration_errors', 10, 3);

    // Fonction pour enregistrer les champs personnalisés dans les métadonnées utilisateur
// function save_custom_user_fields($user_id) {
//     if (isset($_POST['first_name'])) {
//         update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
//     }
//     if (isset($_POST['last_name'])) {
//         update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
//     }
// }
// add_action('user_register', 'save_custom_user_fields');