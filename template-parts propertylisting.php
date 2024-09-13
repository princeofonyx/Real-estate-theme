<article class="property-listing">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <?php endif; ?>
    <div class="property-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>
