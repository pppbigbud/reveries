<?php
get_header();
// echo custom_cart_content();
// echo custom_account_link();
?>
<div class="containerSingleArticle">
    <div class="containerImgSingleArticle">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="containerTxtSingleArticle">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
    </div>
</div>

<div class="lower-section-articles section-divider-lower-articles-single">
    <div class="swiper-container-articles-single">
        <h1 class="titreSingleArticlesSimilaires">Articles similaires</h1>
        <div class="swiper-wrapper">
            <?php
            $categories = wp_get_post_categories(get_the_ID());
            if ($categories) {
                $category_id = $categories[0]; // Utilisez la première catégorie s'il y en a plusieurs.

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1, // Récupérer tous les articles.
                    'cat' => $category_id,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $query = new WP_Query($args);
                $total_posts = $query->found_posts; // Nombre total d'articles dans la catégorie.

                if ($query->have_posts()) :
                    $count = 0;
                    while ($query->have_posts()) : $query->the_post();
                        if ($count % 4 == 0) { // Démarrez un nouveau groupe de 4 articles
                            ?>
                            <div class="swiper-slide">
                            <?php
                                        }
                                        ?>
                            <div class="swiper-content">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="featured-image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                    <?php } ?>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </a>
                            </div>
                            <?php
                                        if ($count % 4 == 3 || $count == $total_posts - 1) { // Fermez le groupe de 4 articles
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
            <div class "arrow-nav-slider-article-left"></div>
        </div>
    </div>
</div>

<?php get_footer();
?>