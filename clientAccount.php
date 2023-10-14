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
        $userDisplayName = '&nbsp' . '<strong>' . esc_html($current_user->display_name) . '</strong>' . '&nbsp';
        $logoutLink = '<a href="' . esc_url(wc_logout_url()) . '">' . esc_html('Déconnexion', 'woocommerce') . '</a>';
        $greeting = 'Bonjour ' . $userDisplayName . ' (vous n\'êtes pas ' . $userDisplayName . '/&nbsp' . $logoutLink . ')';
        echo $greeting;
        ?>
    </div>
</div>

<div class="superContainerInfoAccount">
    <!-- <div class="containerFormInfoMeta">
        <div class="woocommerce-MyAccount-content">

            <div class="containerAdresseMailClient">
                <?php
                $current_user = wp_get_current_user();
                $user_email = $current_user->user_email;
                echo "Adresse e-mail : " . $user_email;
                ?>
            </div>

            <div class="containerAdresseFirstNameClient">
                <?php
                $current_user = wp_get_current_user();
                $first_name = $current_user->first_name;
                $last_name = $current_user->last_name;
                ?>
                <div class="containerNameClient">
                    <?php echo "Prénom : " . $first_name; ?>
                </div>
                <div class="containerLastnameClient">
                    <?php echo "Nom : " . $last_name; ?>
                </div>
            </div>

            <div class="containerAdresseCompanyNameClient">
                <?php
                $current_user = wp_get_current_user();
                $company_name = $current_user->billing_company;
                echo "Nom de l'entreprise : " . $company_name;
                ?>
            </div>

            <div class="containerAdresseCompanyNameClient">
                <?php
                $current_user = wp_get_current_user();
                $address = $current_user->billing_address_1;
                $city = $current_user->billing_city;
                $state = $current_user->billing_state;
                $postcode = $current_user->billing_postcode;
                echo "Adresse de facturation : " . $address . ', ' . $city . ', ' . $state . ' ' . $postcode;
                ?>
            </div>
        </div>

    </div> -->

    <div class="containerFormMetaChange">
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <label for="user_email">Adresse e-mail :</label>
            <input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr($user_email); ?>">

            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr($first_name); ?>">

            <label for="last_name">Nom :</label>
            <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr($last_name); ?>">

            <label for="billing_company">Nom de l'entreprise :</label>
            <input type="text" name="billing_company" id="billing_company" class="input" value="<?php echo esc_attr($company_name); ?>">

            <input type="submit" name="update_profile" class="submitBtnNewAccount" value="Mettre à jour le profil">
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