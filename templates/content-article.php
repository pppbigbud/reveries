<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
            <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline">par <?php the_author(); ?></span>
        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <footer class="entry-footer">
        <span class="cat-links">Catégories : <?php the_category(', '); ?></span>
        <span class="tags-links">Tags : <?php the_tags('', ', '); ?></span>
    </footer>
</article>
