<?php
/*

  Template Name: Articles Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

<!-- <h1 class="TitrePageArticles">Articles</h1> -->
<div class="upper-section-articles section-divider-articles">
    <div class="containerPresentationsArticles ">

        <!-- -----------------------------------SIDEBAR ARTICLES---------------------------------------- -->

        <div class="containerSideBarArticles">
            <div class="containerSideBarArticlesAlignement">
                <label for="category-select">Filtrer par catégorie :</label>
                <a href="#" data-category-articles="0" class="category-link-articles slide-news">Toutes les catégories</a>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<a href="#" data-category-articles="' . $category->term_id . '" class="category-link-articles slide-news">' . $category->name . '</a>';
                }
                ?>
            </div>
        </div>

        <!-- -----------------------------------AFFICHAGE ARTICLES---------------------------------------- -->

        <div class="containerInfoArticles">
            <div class="wrapper-news-articles">
                <?php
                $args = array(
                    'post_type' => 'post',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="slide-news">
                            <a href="<?php the_permalink(); ?>" class="slide-news-articles">
                                <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                    <div class="featured-image">
                                        <?php the_post_thumbnail('thumbnail');
                                                    ?>
                                    </div>
                                <?php } ?>
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>