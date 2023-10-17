<?php
/*

  Template Name: Articles Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

<div class="superContainerSideBarArticlesAlignement">
    <div class="containerTitleArticles">
        <h1><?php the_title(); ?></h1>
    </div>

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

    <div class="containerInfoArticles">
        <div class="wrapper-news-articles">
            <?php
            $args = array(
                'post_type' => 'post', // Afficher uniquement les articles de type "post"
                'posts_per_page' => -1, // Récupérer tous les articles
            );

            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();

                    get_template_part('templates/content', 'article');

                endwhile;
                wp_reset_postdata(); // Réinitialiser la requête WordPress
            else :
                ?>
                <p>Aucun article trouvé.</p>
            <?php
            endif;
            ?>
        </div>
    </div>
    <div class="separtor-page-articles divider-separator-page-articles">
    </div>
</div>

<?php get_footer(); ?>