<?php
/*
 * Template Name: Page de Connexion
 * Template Post Type: page
 */
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

    // Appel de la fonction de validation du mot de passe
    $password_result = check_password_complexity($password, $password);

    if ($password_result === "valid") {
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            echo 'Erreur lors de l\'inscription : ' . $user_id->get_error_message();
        } else {
            $user = get_user_by('ID', $user_id);
            wp_set_current_user($user_id, $user->user_login);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url());
            exit;
        }
    } else {
        // Affichez les messages d'erreur appropriés ici
        echo $password_result;
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