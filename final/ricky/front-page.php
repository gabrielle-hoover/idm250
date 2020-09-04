<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 * Set this in settings > reading > static page
 *
 */

get_header();?>
    <div id="front-page-text-wrapper">
        <?php the_content(); ?>
    </div>
<!--    use featured image as background if it exists-->
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="ricky-background-image-main">
        <?php the_post_thumbnail( 'full' ); ?>
    </div>
    <?php endif ?>
<?php get_footer(); ?>