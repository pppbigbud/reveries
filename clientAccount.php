<?php
/*

  Template Name: Client Account Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

function add_custom_script_to_head() {
    echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/messagePopUp.js"></script>';
}

add_action('wp_head', 'add_custom_script_to_head');

get_header(); 

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
            <form method="post" name="register" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="myFormPasswordChange">
                <label for="new_password">Nouveau mot de passe :</label>
                <input type="password" name="new_password" id="new_password" class="input">
                <div class="error-message" id="new-password-error"></div>

                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" name="confirm_password" id="confirm_password" class="input">
                <div class="error-message" id="confirm-password-error"></div>

                <input type="submit" name="change_password" class="submitBtnNewAccount" value="Changer le mot de passe">
            </form>
            <div id="message-container" class="message-container"></div>
            <div id="message-container-valid" class="message-container-valid"></div>
        </div>
    </div>

    <div class="containerCmdAccount">
        <div class="subContainerAccountCmd">
            <h2 class="titleModifyAccount">Anciennes Commandes</h2>
            <div class="anciennes-commandes">
                <?php
                // Simulation de commandes fictives (remplacez ces données par des données réelles lorsque vous en avez)
                $fake_orders = array(
                    array(
                        'order_id' => '001',
                        'order_date' => '2023-01-15',
                        'order_items' => array(
                            'Produit A' => 2,
                            'Produit B' => 1,
                        ),
                        'order_total' => '150.00',
                    ),
                    array(
                        'order_id' => '002',
                        'order_date' => '2023-02-20',
                        'order_items' => array(
                            'Produit C' => 3,
                        ),
                        'order_total' => '75.00',
                    ),
                );
                ?>
                <select id="orderDropdown" class="infoCmdAccount">
                    <option value="">Sélectionnez une commande</option>
                    <?php
                    foreach ($fake_orders as $order) {
                        echo '<option value="' . $order['order_id'] . '">' . 'Commande n° ' . $order['order_id'] . '</option>';
                    }
                    ?>
                </select>

                <div id="selectedOrderDetails" class="selected-order-details"></div>

                <script type="text/javascript">
                    var fake_orders = <?php echo json_encode($fake_orders); ?>;
                </script>

            </div>
        </div>

    </div>

</div>

<?php get_footer(); ?>