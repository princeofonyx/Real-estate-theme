<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/property-listing', get_post_format());
        endwhile;
    else :
        echo '<p>No properties found</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
