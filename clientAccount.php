<?php
/*

  Template Name: Client Account Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

<?php

defined('ABSPATH') || exit;

$current_user = wp_get_current_user();

do_action('woocommerce_before_account_dashboard'); ?>

<div class="containerAccountPage">
    <div class="containerBonjourClient">
        <?php
        $userDisplayName = '&nbsp' . '<strong>' . esc_html($current_user->user_nicename) . '</strong>' . '&nbsp';
        $logoutLink = '<a href="' . esc_url(wc_logout_url()) . '">' . esc_html('Déconnexion', 'woocommerce') . '</a>';
        $greeting = 'Bonjour ' . $userDisplayName . ' (vous n\'êtes pas ' . $userDisplayName . '/&nbsp' . '<span class="logout-text">' . $logoutLink . '</span>)';
        echo $greeting;
        ?>
    </div>
</div>

<div class="superContainerInfoAccount">

    <div class="containerFormMetaChange">
        <h2 class="titleModifyAccount">Mettre à jour votre profil</h2>
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr($last_name); ?>">
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr($first_name); ?>">
            <label for="user_email">Adresse e-mail :</label>
            <input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr($user_email); ?>">
            <label for="user_description">Description :</label>
            <textarea name="user_description" id="user_description" class="input"><?php echo esc_textarea($user_description); ?></textarea>
            <input type="submit" name="update_profile" class="submitBtnNewAccount" value="Mettre à jour le profil">
        </form>

        <div class="subContainerChangePassword">
            <h2 class="titleModifyAccount">Changer de Mot de passe</h2>
            <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                <label for="new_password">Nouveau mot de passe :</label>
                <input type="password" name="new_password" id="new_password" class="input">

                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" name="confirm_password" id="confirm_password" class="input">

                <input type="submit" name="change_password" class="submitBtnNewAccount" value="Changer le mot de passe">
            </form>
        </div>

    </div>

</div>

<?php get_footer(); ?>