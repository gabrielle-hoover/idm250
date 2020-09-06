<?php
/**
 * The template for displaying all single posts.
 *
 */
?>
 <?php get_header();?>
	<div class="page-builder">
		<?php the_content(); ?>
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="ricky-background-image-main">
			<?php echo get_the_post_thumbnail( get_option( 'woocommerce_shop_page_id' ) ); ?>
		</div>
	<?php endif;
get_footer(); ?>