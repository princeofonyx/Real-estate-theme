<?php get_header(); ?>

<main>
    <article>
        <h1><?php the_title(); ?></h1>
        <div class="property-content">
            <?php the_post_thumbnail(); ?>
            <?php the_content(); ?>
            <p><strong>Property Type:</strong> <?php echo get_the_term_list($post->ID, 'property_type', '', ', '); ?></p>
        </div>
    </article>
</main>

<?php get_footer(); ?>
