<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php the_title()?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--nav icon taken from https://codepen.io/designcouch/pen/Atyop-->
<div id="navbg"></div>
<div id="nav_icon_burger_x" onclick="toggleFunction(event)"> 
  <span class="burger_menu_spans"></span>
  <span class="burger_menu_spans"></span>
  <span class="burger_menu_spans"></span>
  <span class="burger_menu_spans"></span>
</div>
<header class="header" id="my_site_header_nav">
  <div class="header__content">
   <!--nav icon taken from https://codepen.io/designcouch/pen/Atyop-->
    <?php wp_nav_menu(['theme_location' => 'primary_menu']);?>
    <div class="mobile_social_menu">
        <?php wp_nav_menu(['theme_location' => 'social_menu']);?>
    </div>
  </div>
</header>