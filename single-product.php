<?php

/**
 * Single-product.php
 *
 * Contenu de la page single-product.
 *
 * @package Page_Single_Product
 * @author Display Name <username@example.com>
 * @version 1.0.0
 * @copyright (c) 2023 WebCrafted
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPL 2.0
 */
get_header(); 
// echo custom_cart_content();
// echo custom_account_link();

if (have_posts()) : while (have_posts()) : the_post();
        $product_id = get_the_ID();
        $product = wc_get_product($product_id);
        $product_image_url = get_the_post_thumbnail_url($product_id);
        $product_gallery_ids = $product->get_gallery_image_ids(); // Obtenez les images de la galerie du produit
        ?>
        <div class="container-product">
            <div class="sub-container-product">
                <div class="product-image-single">
                    <img id="main-product-image" src="<?php echo esc_url($product_image_url); ?>" alt="<?php echo get_the_title(); ?>">
                    <div class="product-gallery">
                        <?php
                                // Afficher la galerie de produits
                                if (!empty($product_gallery_ids)) {
                                    foreach ($product_gallery_ids as $gallery_image_id) {
                                        $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
                                        ?>
                                <div class="product-image-item">
                                    <img src="<?php echo esc_url($gallery_image_url); ?>" alt="" class="gallery-image" data-large-image="<?php echo esc_url($gallery_image_url); ?>">
                                </div>
                        <?php
                                    }
                                }
                                ?>
                    </div>
                </div>
                <div class="product-details">
                    <h1 class="product-title"><?php echo get_the_title(); ?></h1>
                    <div class="containerInfoStockProduct">
                        <div class="product-categories">
                            <?php
                                    // Récupérez les termes de catégorie associés au produit
                                    $terms = wc_get_product_terms($product_id, 'product_cat');
                                    if (!empty($terms)) {
                                        echo '<p>Catégories : ';
                                        foreach ($terms as $term) {
                                            echo '<a href="' . get_term_link($term->term_id, 'product_cat') . '">' . $term->name . '</a>';
                                        }
                                        echo '</p>';
                                    }
                                    ?>
                        </div>
                        <p>État du produit : <?php echo $product->get_stock_status(); ?></p>
                    </div>
                    <div class="product-description">
                        <p><?php echo $product->get_description(); ?></p>
                    </div>
                    <div class="containerBtnProductSingle">
                        <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
<div class="lower-section-articles section-divider-lower-articles-single">
    <div class="swiper-container-articles-single">
        <h1 class="titreSingleArticlesSimilaires">Produits similaires</h1>
        <div class="swiper-wrapper">
            <?php
            $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat');
            if ($product_categories) {
                $product_category_id = $product_categories[0]->term_id;
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $product_category_id,
                        ),
                    ),
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $query = new WP_Query($args);
                $total_products = $query->found_posts;
                if ($query->have_posts()) :
                    $count = 0;
                    while ($query->have_posts()) : $query->the_post();
                        if ($count % 4 == 0) {
                            ?>
                            <div class="swiper-slide">
                            <?php
                                        }
                                        ?>
                            <div class="swiper-content">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                                if (has_post_thumbnail()) {
                                                    ?>
                                        <div class="featured-image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                    <?php } ?>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                    <!-- Ajouter le prix ici -->
                                    <span class="product-price"><?php echo get_post_meta(get_the_ID(), 'product_price', true); ?></span>
                                    <!-- Bouton pour ajouter au panier -->
                                    <div class="containerbtnSliderProductSingle">
                                        <div class="btnSliderProductSingle"><?php woocommerce_template_loop_add_to_cart(); ?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                        if ($count % 4 == 3 || $count == $total_products - 1) { // Fermez le groupe de 4 produits
                                            ?>
                            </div>
            <?php
                        }
                        $count++;
                    endwhile;
                    wp_reset_postdata();
                endif;
            }
            ?>
        </div>
        <div class="swiper-button-next-article-single">
            <div class="arrow-nav-slider-article-right"></div>
        </div>
        <div class="swiper-button-prev-article-single">
            <div class="arrow-nav-slider-article-left"></div>
        </div>
    </div>
</div>
<?php
get_footer();
?>