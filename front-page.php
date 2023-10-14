<?php get_header(); ?>


<!-- --------------------------SLIDER-HOME----------------------- -->
<section class="slider-container">
    <div class="swiper-container swiper-container-home">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-home">
                <div class="imgContainerSliderHome">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/dragonOrigami.webp" alt="Dragon Origami Bijoux">
                    <div class="textInsideSlider slide-news">
                        <h1>Le Dragon Rouge</h1>
                        <p>L'origami, pour créer des pièces uniques qui racontent une histoire. Chaque bijou est soigneusement plié à la main, transformant une simple feuille de papier en une œuvre d'art que vous pouvez porter avec élégance et fierté. Nos objets de décoration apportent également une touche d'originalité à votre espace, ajoutant une dimension artistique à votre quotidien.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-home">
                <div class="imgContainerSliderHome">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/oursorigami.webp" alt="Ours Origami Décoration">
                    <div class="textInsideSlider slide-news">
                        <h1>Origami 100% Français</h1>
                        <p>L'origami, pour créer des pièces uniques qui racontent une histoire. Chaque bijou est soigneusement plié à la main, transformant une simple feuille de papier en une œuvre d'art que vous pouvez porter avec élégance et fierté. Nos objets de décoration apportent également une touche d'originalité à votre espace, ajoutant une dimension artistique à votre quotidien.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-home">
                <div class="imgContainerSliderHome">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/statuedepacque-origami.webp" alt="Origami papier bijoux">
                    <div class="textInsideSlider slide-news">
                        <h1>Moi Panda</h1>
                        <p>L'origami, pour créer des pièces uniques qui racontent une histoire. Chaque bijou est soigneusement plié à la main, transformant une simple feuille de papier en une œuvre d'art que vous pouvez porter avec élégance et fierté. Nos objets de décoration apportent également une touche d'originalité à votre espace, ajoutant une dimension artistique à votre quotidien.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- --------------------------SEPARATOR-------------------------- -->
<div class="upper-section section-divider">
    <!-- --------------------------PRESENTATION----------------------- -->
    <div class="containerPresentations ">
        <div class="containerInfo">
            <h1 class="titleNews">Qui suis-je ?</h1>
            <div class="containerNewsImgTxt">
                <div class="imgDesk">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/bureauOrigamiSimple.png" alt="Origami papier bijoux">
                </div>
                <div class="txtInfoWhoIm">
                    <h1>Origami une passion</h1>
                    <p>Bienvenue dans mon monde créatif chez [Nom de votre boutique en ligne] ! Je suis passionné(e) par la création de bijoux en papier plié origami et d'objets de décoration uniques. Chaque pièce est réalisée à la main avec soin, en utilisant des techniques traditionnelles.
                        Mes bijoux en papier plié, tels que boucles d'oreilles, colliers et bracelets, sont de véritables œuvres d'art portables. Explorez également ma gamme d'objets de décoration en papier, y compris lanternes, guirlandes et sculptures, pour ajouter une touche d'originalité à votre espace.
                        Chez [Nom de votre boutique], je privilégie des matériaux respectueux de l'environnement et la production artisanale responsable. Chaque achat que vous faites soutient mon engagement en faveur de l'art, de la créativité et de la durabilité.
                        Découvrez ma sélection unique, trouvez le trésor qui illuminera votre quotidien et suivez-moi sur les réseaux sociaux pour rester à jour sur mes dernières créations et offres spéciales. Merci de votre visite et bienvenue dans mon univers fait de pliures et de créativité.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- --------------------------SEPARATOR-------------------------- -->
<div class="lower-section section-divider-lower">
    <!-- --------------------------ARTICLES--------------------------- -->
    <div class="containerActualites">
        <!-- ----------------AFFICHAGE DES ARTICLES------------------- -->
        <div class="container-news">
            <h1 class="titleNews">Mes dernières actualités</h1>
            <div class="containerSelectAjaxArticles">
                <!-- ----------------BTN Filtrage Catégories AJAX------------------- -->
                <div class="category-filter">
                    <div class="category-links">
                        <!-- <label for="category-select">Filtrer par catégorie :</label> -->
                        <a href="#" data-category="0" class="category-link slide-news">Toutes les catégories</a>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            echo '<a href="#" data-category="' . $category->term_id . '" class="category-link slide-news">' . $category->name . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="containerWrapperNews">
                <div class="wrapper-news">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <div class="slider-news-home">
                                <a href="<?php the_permalink(); ?>">
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

            <!-- Ajoutez les boutons de navigation Swiper ici si vous le souhaitez -->
        </div>
    </div>
</div>
<!-- -------------------------SEPARATOR--------------------------- -->
<div class="lower-section-articles section-divider-lower-articles-single">
    <div class="swiper-container-articles-single">
        <h1 class="titreSingleArticlesSimilaires">Nos meilleurs ventes</h1>
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'product', // Récupérer des produits WooCommerce
                'posts_per_page' => 12, // Limitez à 12 produits
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => '_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'NUMERIC'
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC', // Du plus récent au plus ancien
            );

            $query = new WP_Query($args);

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

                                <span class="product-price"><?php echo get_post_meta(get_the_ID(), 'product_price', true); ?></span>

                                <div class="containerbtnSliderProductSingle">
                                    <div class="btnSliderProductSingle"><?php woocommerce_template_loop_add_to_cart(); ?></div>
                                </div>
                            </a>
                        </div>

                        <?php
                                if ($count % 4 == 3 || $count == 11) { // Fermez le groupe de 4 produits (12 produits au total)
                                    ?>
                        </div>
            <?php
                    }
                    $count++;
                endwhile;
                wp_reset_postdata();
            endif;
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

<?php get_footer(); ?>