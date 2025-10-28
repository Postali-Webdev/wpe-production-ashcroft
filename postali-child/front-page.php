<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php get_template_part('block', 'right-bar');?>

<?php the_field('homepage_top'); ?>
<?php get_template_part('block', 'updates');?>
<?php the_field('homepage_bottom'); ?>

<?php get_footer();?>