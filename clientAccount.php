<?php
/*

  Template Name: Client Account Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

<?php
/**
 * Dashboard
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files, and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs, the version of the template file will be bumped and
 * the readme will list any changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

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

    <?php
    $current_user = wp_get_current_user();
    if (is_user_logged_in() && wc_get_customer_order_count($current_user->ID) > 0) {
        $user_email = $current_user->user_email;
        $first_name = $current_user->first_name;
        $last_name = $current_user->last_name;
        $current_user_id = $current_user->ID;
        $billing_address = get_user_meta($current_user_id, 'billing_address_1', true);
        $billing_city = get_user_meta($current_user_id, 'billing_city', true);
        $billing_state = get_user_meta($current_user_id, 'billing_state', true);
        $billing_postcode = get_user_meta($current_user_id, 'billing_postcode', true);
        $billing_company = get_user_meta($current_user_id, 'billing_company', true);
    } else {
        $user_email = $current_user->user_email;
        $first_name = $current_user->first_name;
        $last_name = $current_user->last_name;

        get_avatar_url($current_user->ID);
        $current_user->user_registered;
        $current_user->user_url;
        $current_user->display_name;
        $current_user->ID;
        $current_user->user_login;
        $current_user->roles;
        $current_user->description;
    }

    ?>

    <div class="containerFormMetaChange">
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr($last_name); ?>">
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr($first_name); ?>">
            <label for="user_email">Adresse e-mail :</label>
            <input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr($user_email); ?>">

            <input type="submit" name="update_profile" class="submitBtnNewAccount" value="Mettre à jour le profil">

            <!-- -------------------------------------------INFO A VERIFIER UNE FOIS 1 TEST DE COMMANDE------------------------------------------ -->

            <?php
            $order_count = wc_get_customer_order_count($current_user->ID);
            if ($order_count > 0) {
                echo '<span for="billing_company">Nom (adresse de livraison) : ' . esc_attr($billing_company) . '</span>';
                echo '<span for="billing_company">Adresse : ' . esc_attr($billing_address) . '</span>';
                echo '<span for="billing_company">Ville : ' . esc_attr($billing_city) . '</span>';
                // Vous pouvez décommenter la ligne ci-dessous si vous souhaitez également afficher l'État (state).
                // echo '<span for="billing_company">Nom de l\'entreprise : ' . esc_attr($billing_state) . '</span>';
                echo '<span for="billing_company">Code postal : ' . esc_attr($billing_postcode) . '</span>';
            }
            ?>

        </form>
    </div>

</div>

<?php
if (isset($_POST['update_profile'])) {


    // Mettez à jour les informations du profil ici
    $new_email = sanitize_email($_POST['user_email']);
    $new_first_name = sanitize_text_field($_POST['first_name']);
    $new_last_name = sanitize_text_field($_POST['last_name']);
    $new_company_name = sanitize_text_field($_POST['billing_company']);
    // Mettez à jour les informations du profil utilisateur
    wp_update_user([
        'ID' => $current_user->ID,
        'user_email' => $new_email,
        'first_name' => $new_first_name,
        'last_name' => $new_last_name,
    ]);


    // Mettez à jour le nom de l'entreprise dans les métadonnées de facturation de WooCommerce
    update_user_meta($current_user->ID, 'billing_company', $new_company_name);


    // Redirection en JavaScript
    echo '<script>window.location.href = "' . esc_url($_SERVER['REQUEST_URI']) . '";</script>';
    exit;

    // echo 'Profil mis à jour avec succès !';

}

?>

<?php get_footer(); ?>