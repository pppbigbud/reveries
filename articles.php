<?php
/*

  Template Name: Articles Page

  Template Name: Full-width

  Template Post Type: post, page, product

*/

?>

<?php get_header(); ?>

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

<!-- -----------------------------------AFFICHAGE ARTICLES (à mettre à jour via AJAX) ---------------------------------------- -->

<div class="containerInfoArticles">
    <div class="wrapper-news-articles">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();

                        get_template_part('content', 'article');

                    endwhile;
                else :
                    get_template_part('content', 'none');
                endif;
                ?>

            </main>
        </div>
    </div>
</div>


<?php get_footer(); ?>