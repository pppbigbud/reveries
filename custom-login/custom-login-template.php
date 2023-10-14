<?php
/*
 * Template Name: Page de Connexion
 * Template Post Type: page
 */

// Inclure le fichier d'en-tête WordPress.
get_header();
echo custom_cart_content();
echo custom_account_link();

// Vérifiez si l'utilisateur est connecté en tant qu'administrateur.
if (is_user_logged_in() && current_user_can('administrator')) {
    // Commencer la mise en mémoire tampon de la sortie
    ob_start();
    // Utiliser JavaScript pour la redirection vers le backoffice WordPress
    ?>
    <script>
        window.location.href = '<?php echo admin_url(); ?>';
    </script>
<?php
    // Récupérer la sortie mise en mémoire tampon
    $output = ob_get_clean();
    // Afficher la sortie après la redirection
    echo $output;
    exit; // Arrêtez l'exécution du script
} elseif (is_user_logged_in()) {
    // Commencer la mise en mémoire tampon de la sortie
    ob_start();
    // Utiliser JavaScript pour la redirection vers le backoffice WordPress
    ?>
    <script>
        window.location.href = '<?php echo home_url(); ?>';
    </script>
<?php
    // Récupérer la sortie mise en mémoire tampon
    $output = ob_get_clean();
    // Afficher la sortie après la redirection
    echo $output;
    exit; // Arrêtez l'exécution du script
}

// Commencer la mise en mémoire tampon de la sortie
ob_start();

// Afficher le formulaire de connexion WordPress standard
?>
<div class="containerAccountSubscrit">
    <div class="containerLoginForm"><?php wp_login_form(); ?></div>
    <?php
    // Récupérer la sortie mise en mémoire tampon
    $output = ob_get_clean();

    // Afficher la sortie après la redirection
    echo $output;

    if (isset($_POST['register-submit'])) {
        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = esc_attr($_POST['password']);

        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            echo 'Erreur lors de l\'inscription : ' . $user_id->get_error_message();
        } else {
            // Récupérer la sortie mise en mémoire tampon
            ob_start();
            // L'utilisateur est inscrit avec succès, connectez-le et effectuez la redirection JavaScript.
            $user = get_user_by('ID', $user_id);
            wp_set_current_user($user_id, $user->user_login);
            wp_set_auth_cookie($user_id);


            $output = ob_get_clean();
            // echo $output;
            echo '<script>location.replace("' . home_url() . '");</script>';
            exit; // Arrêtez l'exécution du script.
        }
    }

    // Ne mettez pas de code générant une sortie ici, assurez-vous que tout affichage vient après cette section.

    // Afficher le formulaire d'inscription
    ?>
    <div class="containerFormAccountInput">
        <form method="post">
            <label for="username">Pseudonyme</label>
            <input type="text" name="username" id="username" class="input" required>
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" id="email" class="input" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="input" required>

            <input type="submit" class="submitBtnNewAccount" name="register-submit" value="S'inscrire">
        </form>
    </div>
</div>
<?php
get_footer();
?>