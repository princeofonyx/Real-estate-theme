<?php
/* Template Name: Property Listings */
get_header(); ?>

<main>
    <h1>Property Listings</h1>

    <?php
    $property_query = new WP_Query(array(
        'post_type' => 'property',
        'posts_per_page' => 10,
    ));

    if ($property_query->have_posts()) :
        while ($property_query->have_posts()) : $property_query->the_post();
            get_template_part('template-parts/property-listing');
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No properties found.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
