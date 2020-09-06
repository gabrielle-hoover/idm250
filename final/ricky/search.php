<?php
/*
 * Template Name: Search Page
 *
 */

get_header();?>
<main class="main-content">
  <!-- Search -->
  <section id="searchbar">
    <form action="/idm250/" method="get">
      <label for="searchField"></label>
      <input type="text" name="s" id="searchField" value="<?php the_search_query(); ?>">
      <input id="searchpagebutton" type="submit" value="Search">
    </form>
  </section>

  <!-- Results -->
  <section>
    <?php if (have_posts()): ?>
      <ul>
        <?php while (have_posts()) : the_post(); ?>
				 <li class="">
						 <a href=<?php echo the_permalink()?>><h2 class="post_title"><?php if (get_the_title()!='Search'){ echo the_title() ;}; ?></h2></a>
				 </li>
			<?php endwhile; ?>
      </ul>
    <?php else: ?>
      <h2>Sorry, there are no results</h2>
    <?php endif; ?>
  </section>

</main>

<!--    use featured image as background if it exists-->
<!--
found selector for featured image on :
https://www.themelocation.com/how-to-add-pages-featured-image-to-wocommerces-shop-page/
-->
    <div class="ricky-background-image-main">
        <?php echo get_the_post_thumbnail( get_option( 'woocommerce_shop_page_id' ) ); ?>
    </div>

<?php get_footer(); ?>