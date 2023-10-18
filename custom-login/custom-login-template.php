<?php
/*

  Template Name: Page de connexion

  Template Name: Full-width

  Template Post Type: post, page, product

*/

// function add_custom_script_to_head() {
//     echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/messagePopUp.js"></script>';
// }

// add_action('wp_head', 'add_custom_script_to_head');


if (is_user_logged_in() && current_user_can('administrator')) {
    wp_redirect(admin_url());
    exit;
} elseif (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

if (isset($_POST['register-submit'])) {
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = esc_attr($_POST['password']);

    // Créez un nouvel utilisateur
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        echo 'Erreur lors de l\'inscription : ' . $user_id->get_error_message();
    } else {
        // Générez un token d'activation unique
        $activation_token = wp_generate_password(32, false);

        // Enregistrez le token dans les user_meta
        update_user_meta($user_id, '_activation_token', $activation_token);

        // Envoyez un email d'activation
        $activation_link = home_url('/activation/?token=' . $activation_token); // Lien de la page de validation
        $subject = 'Activation de votre compte';
        $message = 'Cliquez sur le lien suivant pour activer votre compte : ' . $activation_link;

        wp_mail($email, $subject, $message);

        // Connexion automatique de l'utilisateur après l'inscription
        wp_set_current_user($user_id, $username);
        wp_set_auth_cookie($user_id);
        wp_redirect(home_url()); // Redirigez l'utilisateur après l'inscription
        exit;
    }
}


get_header();
echo custom_cart_content();
echo custom_account_link();
?>
<div class="containerAccountSubscrit">
    <div class="containerLoginForm">
        <h1 class="titleInscriptionAccount">Se connecter</h1>
        <?php wp_login_form(); ?>
    </div>

    <div class="containerFormAccountInput">
        <h1 class="titleInscriptionAccount">Créer un compte</h1>
        <form method="post" name="register">
            <label for="username">Pseudonyme</label>
            <input type="text" name="username" id="username" class="input" required>
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" id="email" class="input" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="input" required>

            <!-- Vous pouvez ajouter des éléments HTML pour afficher les messages d'erreur ici -->

            <input type="submit" class="submitBtnNewAccount" name="register-submit" value="S'inscrire">
        </form>
    </div>
</div>

<?php get_footer(); ?>