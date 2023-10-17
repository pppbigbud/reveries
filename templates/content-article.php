<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <p><?php
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
        $trimmed_content = wp_trim_words(get_the_content(), 50);
        echo $trimmed_content;

        echo '<a href="' . get_permalink() . '">Lire la suite</a>';
        ?>
    </div>
    <footer class="entry-footer">
    </footer>
</article>