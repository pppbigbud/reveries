<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <p><?php
            // Afficher l'image mise en avant (à la une)
            if (has_post_thumbnail()) {
                the_post_thumbnail();
            } ?>
        </p>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
            <span class="posted-on"><?php echo get_the_date() . ' ' . the_author(); ?></span>
            <span class="cat-links">Catégories : <?php the_category(', '); ?></span>
        </div>
    </header>
    <div class="entry-content">
        <?php
        // Limitez le contenu à 50 mots
        $trimmed_content = wp_trim_words(get_the_content(), 50);
        echo $trimmed_content;

        // Ajoutez un lien "Lire la suite" vers l'article complet
        echo '<a href="' . get_permalink() . '">Lire la suite</a>';
        ?>
    </div>
    <footer class="entry-footer">
    </footer>
</article>