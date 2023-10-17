<?php
/*
Template Name: Page de Validation de Compte
*/

get_header();

if (isset($_GET['token'])) {
    $token = sanitize_text_field($_GET['token']);
    $user_id = get_user_by('_activation_token', $token);
    
    if ($user_id) {
        // Activer le compte
        $user = get_userdata($user_id);
        update_user_meta($user->ID, '_activation_status', 'active');

        // Rediriger l'utilisateur vers la page de confirmation
        wp_redirect(home_url('/confirmation/?status=activated'));
        exit;
    } else {
        echo 'Token invalide. Veuillez réessayer ou contactez le support.';
    }
} else {
    echo 'Token non fourni. Veuillez suivre le lien de validation dans votre email.';
}

get_header();
?>
<!-- Contenu de la page de validation -->
<div class="container">
    <!-- Vous pouvez personnaliser le contenu ici -->
</div>
<?php get_footer(); ?>
