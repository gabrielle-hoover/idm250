<?php
/*
 * Template Name: Contact
 * Template Post Type: post, page, product
 * The template for displaying a page with an email form
 *
 */
?>

<?php get_header();?>

<h2>Send e-mail to someone@example.com:</h2>

<form action="mailto:grh39@drexel.edu" method="post" enctype="text/plain">
Name:<br>
<input type="text" name="name" placeholder="Name:"><br>
E-mail:<br>
<input type="text" name="mail"><br>
Write What's on your mind...<br>
<input type="text" name="comment" size="50"><br><br>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>

<?php get_footer(); ?>