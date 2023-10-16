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

<!-- --------------------------ARTICLES--------------------------- -->
<div class="containerSideBarArticles">
    <div class="containerSideBarArticlesAlignement">
        <label for="category-select">Filtrer par catégorie :</label>
        <a href="#" data-category-articles="0" class="category-link-4articles slide-news">Toutes les catégories</a>
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<a href="#" data-category-4articles="' . $category->term_id . '" class="category-link-4articles slide-news">' . $category->name . '</a>';
        }
        ?>
    </div>
</div>

<div class="wrapper-news-articles">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,  // Limitez le nombre d'articles à 4 pour la page d'accueil
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    // Affichez le contenu de l'article
                    get_template_part('content', 'article');
                endwhile;
            else :
                get_template_part('content', 'none');
            endif;
            wp_reset_postdata();
            ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>