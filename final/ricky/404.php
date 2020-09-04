<?php
get_header();?>
<div class="error_page_ricky_stuff">
	<h1>404</h1>
	<h3>Page not found</h3>
</div>
 <div class="ricky-background-image-main">
	  <?php echo get_the_post_thumbnail( get_option( 'woocommerce_shop_page_id' ) ); ?>
 </div>
<?php get_footer(); ?>