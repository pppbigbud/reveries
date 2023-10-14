<?php

function load_jquery()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');


// Ajouter la prise en charge des pages templates
add_theme_support('page-templates');

add_action('after_setup_theme', 'theme_add_woocommerce_support');
function theme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


//Ajouter CSS au Header
function ajouter_CSS_Header()
{
    wp_enqueue_style('swiperCSS', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '6.8.0');
    wp_enqueue_style('body', get_template_directory_uri() . '/css/body.css', array(), '1.0', 'all');
    wp_enqueue_style('logoHeader', get_template_directory_uri() . '/css/logoHeader.css', array(), '1.0', 'all');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', array(), '1.0', 'all');
    wp_enqueue_style('navCloudSvg', get_template_directory_uri() . '/css/navCloudSvg.css', array(), '1.0', 'all');
    wp_enqueue_style('productPage', get_template_directory_uri() . '/css/productPage.css', array(), '1.0', 'all');
    wp_enqueue_style('articlesPage', get_template_directory_uri() . '/css/articlesPage.css', array(), '1.0', 'all');
    wp_enqueue_style('articlesSingle', get_template_directory_uri() . '/css/articlesSingle.css', array(), '1.0', 'all');
    wp_enqueue_style('cartWoo', get_template_directory_uri() . '/css/boutiquePageWoo.css', array(), '1.0', 'all');
    wp_enqueue_style('accountPage', get_template_directory_uri() . '/css/accountPage.css', array(), '1.0', 'all');
    wp_enqueue_style('boutiquePageWoo', get_template_directory_uri() . '/css/cartWoo.css', array(), '1.0', 'all');
    wp_enqueue_style('cartCheckOut', get_template_directory_uri() . '/css/cartCheckOut.css', array(), '1.0', 'all');
    wp_enqueue_style('slider', get_template_directory_uri() . '/css/slider.css', array(), '1.0', 'all');
    wp_enqueue_style('separateurHome', get_template_directory_uri() . '/css/separateurHome.css', array(), '1.0', 'all');
    wp_enqueue_style('frontPageActu', get_template_directory_uri() . '/css/frontPageActu.css', array(), '1.0', 'all');
    wp_enqueue_style('cardsNews', get_template_directory_uri() . '/css/cardsNews.css', array(), '1.0', 'all');
    wp_enqueue_style('filterAjax', get_template_directory_uri() . '/css/filterAjax.css', array(), '1.0', 'all');
    wp_enqueue_style('frontPagePresentation', get_template_directory_uri() . '/css/frontPagePresentation.css', array(), '1.0', 'all');
    wp_enqueue_style('frontPageBoutique', get_template_directory_uri() . '/css/frontPageBoutique.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'ajouter_CSS_Header');

// Ajout des CDN au head
function charger_cdn_scripts()
{
    wp_enqueue_script('mini-lightbox', '/node_modules/mini-lightbox/dist/mini-lightbox.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('animeJS', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', array(), '3.2.1', true);
    wp_enqueue_script('swiperJS', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('animeJS'), '10.3.1', true);
}
add_action('wp_enqueue_scripts', 'charger_cdn_scripts');


// Ajout Script Perso

// CLOUD

function charger_scripts_personnalises_cloud()
{
    wp_enqueue_script('animeCloudJS', get_template_directory_uri() . '/js/animeClouds.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'charger_scripts_personnalises_cloud');

// SWIPER

function charger_scripts_personnalises_swiper()
{
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'charger_scripts_personnalises_swiper');

// LIGHT-BOX PRODUCT

function charger_scripts_personnalises_light_box_product()
{
    wp_enqueue_script('ligthBoxProduct', get_template_directory_uri() . '/js/ligthBoxProduct.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'charger_scripts_personnalises_light_box_product');


// AJAX pour les catégories d'articles

function charger_scripts_personnalises_ajax_category()
{
    wp_enqueue_script('ajaxCategory', get_template_directory_uri() . '/js/ajaxFilterCategory.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'charger_scripts_personnalises_ajax_category');

function localize_ajaxurl()
{
    wp_localize_script('ajaxCategory', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'localize_ajaxurl');



// FILTRE AJAX pour les catégories d'articles page d'accueil

function filter_articles()
{
    // Message de débogage : Fonction filter_articles appelée
    error_log('Fonction filter_articles appelée.');

    $selectedCategory = $_POST['category'];

    // Message de débogage : Catégorie sélectionnée
    error_log('Catégorie sélectionnée : ' . $selectedCategory);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    );

    if ($selectedCategory != 0) {
        $args['cat'] = $selectedCategory;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Début de la mise en page de l'article
            echo '<div class="slider-news-home">';

            // Lien vers l'article
            echo '<a href="' . get_the_permalink() . '">';

            // Image à la une de l'article
            if (has_post_thumbnail()) {
                echo '<div class="featured-image">';
                the_post_thumbnail('thumbnail');
                echo '</div>';
            }

            // Titre de l'article
            echo '<h2>' . get_the_title() . '</h2>';

            // Extrait de l'article
            the_excerpt();

            // Fin de la mise en page de l'article
            echo '</a>'; // Fermeture du lien
            echo '</div>'; // Fermeture de la div .slide-news

            // Message de débogage : Affichage de l'article
            error_log('Affichage de l\'article : ' . get_the_title()); // Exemple avec le titre de l'article

        endwhile;
        wp_reset_postdata();
    endif;

    // Message de débogage : Fin de la fonction filter_articles
    error_log('Fin de la fonction filter_articles.');

    die(); // Important pour terminer la requête AJAX correctement
}

add_action('wp_ajax_filter_articles', 'filter_articles');
add_action('wp_ajax_nopriv_filter_articles', 'filter_articles');


// FILTRE AJAX pour les catégories d'articles

function filter_articles_page()
{
    // Message de débogage : Fonction filter_articles appelée
    error_log('Fonction filter_articles_page appelée.');

    $selectedCategory2 = $_POST['category'];

    // Message de débogage : Catégorie sélectionnée
    error_log('Catégorie sélectionnée : ' . $selectedCategory2);

    $args = array(
        'post_type' => 'post',
    );

    if ($selectedCategory2 != 0) {
        $args['cat'] = $selectedCategory2;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Début de la mise en page de l'article
            echo '<div class="slide-news">';

            // Lien vers l'article
            echo '<a href="' . get_the_permalink() . '">';

            // Image à la une de l'article
            if (has_post_thumbnail()) {
                echo '<div class="featured-image">';
                the_post_thumbnail('thumbnail');
                echo '</div>';
            }

            // Titre de l'article
            echo '<h2>' . get_the_title() . '</h2>';

            // Extrait de l'article
            the_excerpt();

            // Fin de la mise en page de l'article
            echo '</a>'; // Fermeture du lien
            echo '</div>'; // Fermeture de la div .slide-news

            // Message de débogage : Affichage de l'article
            error_log('Affichage de l\'article : ' . get_the_title()); // Exemple avec le titre de l'article

        endwhile;
        wp_reset_postdata();
    endif;

    // Message de débogage : Fin de la fonction filter_articles
    error_log('Fin de la fonction filter_articles_page.');

    die(); // Important pour terminer la requête AJAX correctement
}

add_action('wp_ajax_filter_articles_page', 'filter_articles_page');
add_action('wp_ajax_nopriv_filter_articles_page', 'filter_articles_page');



// CUSTOM CART pour woo-commerce
function custom_cart_content()
{
    // ob_start();
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

    // return ob_get_clean();
}

// CUSTOM CLIENT ACCOUNT pour woo-commerce

function custom_account_link()
{
    ?>
    <div class="custom-account">
        <?php if (is_user_logged_in()) { // Vérifiez si l'utilisateur est connecté 
                $my_account_url = get_permalink(wc_get_page_id('myaccount'));
                ?>
            <a href="<?php echo $my_account_url; ?>" class="imgCart">
                <img src="<?php echo get_template_directory_uri(); ?>/svg/account.svg" alt="Panier Reverie et petits plis">
                <p class="connectTxtSideBar">Mon Compte</p></a>
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
