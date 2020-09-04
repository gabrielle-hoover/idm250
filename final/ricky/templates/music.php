<?php
/*
 * Template Name: Music
 * Template Post Type: post, page, product
 * The template for displaying a photos page
 *
 */
?>
<?php get_header(); ?>

<div class="all-songs-grid-container">
    <?php the_content(); ?>
</div>

<div class="ricky-background-image-main">
    <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail( 'full' );
        }
    ?>
</div>
<?php get_footer(); ?>